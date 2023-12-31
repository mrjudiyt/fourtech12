<?php
namespace Modules\GST\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\GST\Http\Requests\GstgroupRequest;
use Modules\GST\Repositories\GstConfigureRepository;
use Modules\GST\Services\GSTService;
use Modules\UserActivityLog\Traits\LogActivity;
use \Modules\Product\Services\CategoryService;

class ConfigurationController extends Controller
{
    protected $gstConfigureRepo;
    protected $gstService;
    protected $categoryService;
  
    
    public function __construct(GstConfigureRepository $gsiConfigureRepository, GSTService $gstService,CategoryService $categoryService)
    {
        $this->gstConfigureRepo = $gsiConfigureRepository;
        $this->gstService = $gstService;        
        $this->categoryService = $categoryService;        
            
    }

    public function configuration()
    {
        $data['gst_lists'] = $this->gstService->getActiveList();
        $data['gst_configs'] = json_decode(file_get_contents(base_path('Modules/GST/Resources/assets/config_files/config.json')), true);
        $data['gst_groups'] = $this->gstConfigureRepo->getGroup();
        return view('gst::configurations.index', $data);
    }
    public function configuration_update(Request $request)
    {
         try {
             $this->gstConfigureRepo->updateConfiguration($request->except("_token"));
             LogActivity::successLog('GST Configuration updated.');
             Toastr::success(__('common.updated_successfully'), __('common.success'));
             return back();
         } catch (\Exception $e) {
             LogActivity::errorLog($e);
             Toastr::error(__('common.error_message'), __('common.error'));
             return back();
         }
    }

    public function get_outsite_state_gst(Request $request){
        $lists = $request->lists;
        return view('gst::configurations.components.outsite_state_gst', compact('lists'));
    }
    public function get_outsite_state_gst_edit(Request $request){
        $lists = $request->lists;
        $prev_list = json_decode($request->prev_val);
        $prev_list = (array) $prev_list;

        return view('gst::configurations.components.outsite_state_gst_edit', compact('lists','prev_list'));
    }

    public function get_same_state_gst(Request $request){
        $lists = $request->lists;
        return view('gst::configurations.components.same_state_gst', compact('lists'));
    }
    public function get_same_state_gst_edit(Request $request){
        $lists = $request->lists;
        $prev_list = json_decode($request->prev_val);
        $prev_list = (array) $prev_list;
        
        return view('gst::configurations.components.same_state_gst_edit', compact('lists','prev_list'));
    }
    
    public function storeGroup(GstgroupRequest $request){
        $this->gstConfigureRepo->stoteGroup($request->except('_token'));
        return $this->reloadWithGroup();
    }

    public function updateGroup(GstgroupRequest $request){
        try {
            $this->gstConfigureRepo->updateGroup($request->except('_token'));
            return $this->reloadWithGroup();
            LogActivity::successLog('GSTGroup successfully updated.');
            Toastr::success(__('common.updated_successfully'), __('common.success'));
            return back();
        } catch (\Exception $e) {
            LogActivity::errorLog($e);
            Toastr::error(__('common.error_message'), __('common.error'));
            return back();
        }
    }

    public function deleteGroup(Request $request){
        $result = $this->gstConfigureRepo->deleteGroupById($request->id);
        if($result == 'posible'){
            return $this->reloadWithGroup();
        }else{
            return response()->json([
                'parent_msg' => 'This Item Is not Deletable.'
            ]);
        }
    }

    public function editGroup($id){
        $group = $this->gstConfigureRepo->getGroupById($id);
        $gst_lists = $this->gstService->getActiveList();
        $first_category =$this->categoryService->getActiveAll();
        return view('gst::configurations.components.edit_group',compact('group', 'gst_lists','first_category'));
    }

    private function reloadWithGroup(){
        $gst_groups = $this->gstConfigureRepo->getGroup();
        $gst_lists = $this->gstService->getActiveList();
        return response()->json([
            'list' => (string)view("gst::configurations.components.group_list", compact('gst_groups')),
            'createForm' => (string)view("gst::configurations.components.add_group", compact('gst_lists'))
        ]);
    }
}
