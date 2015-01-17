<?php 

class PageController extends BaseController
{
    protected $model;

    public function __construct(Page $page)
    {
        $this->model = $page;
    }

    public function getIndex()
    {
        $pages = Page::orderBy('name')->paginate(20);

        return View::make('pages/view')->with('pages', $pages);
    }

    public function getCreate()
    {
//        $categories = Category::where('active', true)->where('category_id', 0)->orWhere('category_id', null)->orderBy('name')->get();

        return View::make('pages.create');
    }

    public function getEdit($sid)
    {
        // Find the product using the user id
        $page = Page::find($sid);

        // No such id
        if ($page == null) {
            return View::make('redminportal::pages/404');
        }

        return View::make('pages/edit')
            ->with('page', $page);
            
    }

    public function postStore()
    {
        $sid = Input::get('id');

        /*
         * Validate
         */
        $rules = array(
           
            'name'              => 'required|unique:pages,name' . (isset($sid) ? ',' . $sid : ''),
            'short_description' => 'required',
            
        );

        $validation = Validator::make(Input::all(), $rules);

        if ($validation->passes()) {
            $name               = Input::get('name');
           
            $short_description  = Input::get('short_description');
            $long_description   = Input::get('long_description');
            
            $active             = (Input::get('active') == '' ? false : true);
            

            $page = (isset($sid) ? Page::find($sid) : new Page);
            
            if ($page == null) {
                $errors = new \Illuminate\Support\MessageBag;
                $errors->add(
                    'editError',
                    "The Page cannot be found because it does not exist or may have been deleted."
                );
                return \Redirect::to('/admin/pages')->withErrors($errors);
            }
            
            $page->name = $name;
            
            $page->short_description = $short_description;
            $page->long_description = $long_description;
           
            $page->active = $active;
           

            $page->save();

        //if it validate
        } else {
            if (isset($sid)) {
                return Redirect::to('admin/pages/edit/' . $sid)->withErrors($validation)->withInput();
            } else {
                return Redirect::to('admin/pages/create')->withErrors($validation)->withInput();
            }
        }

        return Redirect::to('admin/pages');
    }

    public function getDelete($sid)
    {
        // Find the product using the user id
        $page = Page::find($sid);

        if ($page == null) {
            $errors = new \Illuminate\Support\MessageBag;
            $errors->add('deleteError', "We are having problem deleting this entry. Please try again.");
            return Redirect::to('admin/pages')->withErrors($errors);
        }
     

        // Delete the page
        $page->delete();

        return Redirect::to('admin/pages');
    }
}
