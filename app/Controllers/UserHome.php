<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Models\Vandormodel;
class UserHome extends BaseController
{
    public function index()
    {
        helper(['form','url']);
        $session = session();
        $id=$session->get('Id');
        $Usermodel=new UserModel();
        $singleRow=  $Usermodel->getuserRow($id);
        $da['data']=$singleRow;
       return view('Users/User_view', $da);
    }
    public function UserEdit($User_id)
    {
    //    echo $User_id;
        $session = session();
        helper('form');
        $Usermodel=new UserModel();
        $singleRow=  $Usermodel->getuserRow($User_id);
        if(empty($singleRow))
        {
            return redirect()->to('/user_Home');
        }
        $data=[];
        $data['data']=$singleRow;
        if($this->request->getMethod()=='post')
        {
            $rules=[
                'name'=>'required|min_length[3]|max_length[20]',
                'phone'=>'required|min_length[10]|max_length[11]',
                'dob'=>'required',
                'address'=>'required|min_length[10]|max_length[200]',
                'hobb'=>['label'=>'Hobby','rules'=>'required'],
                'city'=>'required'
            ];
            if($this->validate($rules))
            {
                    $data['validation']=$this->validator;
                    $model=new UserModel();
                    $img=$this->request->getFile('img'); 
                    $USERDATA= $model->find($User_id);

                if ($img->isValid() && !$img->hasMoved())
                {   
                    $old_img=$USERDATA["img"];
                    if(file_exists('uploads/'.$old_img))
                    {
                        @unlink('uploads/'.$old_img);
                    }
                    $imgName=$img->getRandomName();
                    $img->move('uploads/',$imgName);
                    $Data=[
                        'name'=>$this->request->getVar('name'),
                        'phone'=>$this->request->getVar('phone'),
                        'dob'=>$this->request->getVar('dob'),
                        'address'=>$this->request->getVar('address'),
                        'gender'=>$this->request->getVar('gender'),
                        'hobb'=>  implode(',', $this->request->getVar('hobb')), 
                        'img'=>$imgName,
                        'city'=>$this->request->getVar('city'),
                        'update_time' => date('Y-m-d H:i:s')
                    ];
                    $model->update($User_id,$Data);
                    $session->setFlashdata('success','data Add with Image successfully !!');        
                    return redirect()->to('/user_Home');
                }
                else
                {
                    $old_img=$USERDATA["img"];
                    $Data=[
                        'name'=>$this->request->getVar('name'),
                        'phone'=>$this->request->getVar('phone'),
                        'dob'=>$this->request->getVar('dob'),
                        'address'=>$this->request->getVar('address'),
                        'gender'=>$this->request->getVar('gender'),
                        'hobb'=>  implode(',', $this->request->getVar('hobb')), 
                        'img'=>$old_img,
                        'city'=>$this->request->getVar('city'),
                        'update_time' => date('Y-m-d H:i:s')
                    ];
                    $model->update($User_id,$Data);
                    $session->setFlashdata('success','data Add  with Out Image successfully !!');        
                    return redirect()->to('/user_Home');
                }
            }
            else
            {        
                $data['validation']=$this->validator;
                return view('Users/User_edit',$data);
            } 
        }
        return view('Users/User_edit',$data);
    }

    public function delete_User($id)
    {
        $model=new UserModel();
        $USERDATA= $model->find($id);
        $old_img=$USERDATA["img"];
        if(file_exists('uploads/'.$old_img))
        {
            @unlink('uploads/'.$old_img);
        }
        if($model->where('Id',$id)->delete())
        {
            session()->destroy();
            return redirect()->to('/UserSignIn');
        }
    }

    public function UserLogOut()
    {
       session()->destroy();
       return redirect()->to('/UserSignIn');
    }
   
    // ================| add vendor code start |==============

    public function vendor_list()
    {
        $session = \Config\Services::session();
        $da['session']=$session;
        helper(['form','url']);
        $session = session();
        $id=$session->get('Id');
        $Usermodel=new UserModel();
        $singleRow=  $Usermodel->getuserRow($id);
        $da['data']=$singleRow;

        $model=new Vandormodel();
        $records= $model->getRecord();
        $da["dat"]=$records;
        return  view('Users/vandorList.php',$da);
    }

    public  function createFild()
    {
        $session = session();
        helper(['form','url']);
        $da['session']=$session; 
        $id=$session->get('Id');
        $Usermodel=new UserModel();
        $singleRow=  $Usermodel->getuserRow($id);
        $da['data']=$singleRow;
        return  view('Users/create.php',$da);
    }
    public function store()
    {
        $session = session();
        helper(['form','url']);
        $validation = \Config\Services::validation();    
        if($this->request->getMethod()=='post')
        {
            $input=$this->validate([
                'vandor_title'=>'required',
                'vandor_description'=>'required',
                'image' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[image]'.'|is_image[image]'.'|mime_in[image,image/jpg,image/jpeg,image/png]' ]
            ]);

            if($input==true){
                $img = $this->request->getFile('image');
                if (!$img->hasMoved())
                {
                        $imgName = $img->getRandomName();
                        $img->move('vendor/', $imgName);
                    //form vailided successfully condition
                        $model=new Vandormodel();
                        $insert=   $model->save([
                            'vandor_title'=>$this->request->getPost('vandor_title'),
                            'vandor_description'=>$this->request->getPost('vandor_description'),
                            'image' => $imgName,
                            'create_time' => date('Y-m-d H:i:s')
                         ]);
                    if($insert)
                    {
                        echo "Data Insert";
                    }
                }
            }else{
                // $errors = $validation->getErrors();
                // echo json_encode( ['error' => true,'message'=>$errors]); 
                echo "Data not fill in input feild";             
            }
        }       
    }

    public function edit($vandor_Id)
    {
        
        $session = session();
        helper(['form','url']);
        $da['session']=$session;
        $id=$session->get('Id');
            $Usermodel=new UserModel();
            $singleRow=  $Usermodel->getuserRow($id);
            $da['data']=$singleRow;

        $model=new Vandormodel();
        $singleRow= $model->getRow($vandor_Id);
        if(empty($singleRow))
        {
        return redirect()->to('/User_create');
        }
        
            $da['row']=$singleRow;
            return  view('Users/edit',$da);
    }

    public function Update($vandor_Id)
    {
        helper(['form','url']);
        $model=new Vandormodel();
        if($this->request->getMethod()=='post')
        {
        $input=$this->validate([
            'vandor_title'=>'required',
            'vandor_description'=>'required',
        ]);
        if($input==true){
            $model=new Vandormodel();
            $vendorDATA= $model->find($vandor_Id);
            $old_img=$vendorDATA["image"];
            $img = $this->request->getFile('image');
            if ($img->isValid() && !$img->hasMoved())
            { 
                if(file_exists('vendor/'.$old_img))
                {
                    @unlink('vendor/'.$old_img);
                }
                $imgName = $img->getRandomName();
                $img->move('vendor/', $imgName);
            //form vailided successfully condition
                $update=  $model->update($vandor_Id, [
                'vandor_title'=>$this->request->getPost('vandor_title'),
                'vandor_description'=>$this->request->getPost('vandor_description'),
                'image' => $imgName,
                'update_time' => date('Y-m-d H:i:s')
            ]);
                if($update){
                    echo "Data with Image Insert";
                }
            }else{
                $up_img=  $model->update($vandor_Id, [
                    'vandor_title'=>$this->request->getPost('vandor_title'),
                    'vandor_description'=>$this->request->getPost('vandor_description'),
                    'image' =>$old_img,
                    'update_time' => date('Y-m-d H:i:s')
                ]);
                if($up_img){
                    echo "Data with Out Image Insert";
                }
            }
            }else{
                    echo "Data Required";
            // $errors = $validation->getErrors();
                // echo json_encode( ['error' => true,'message'=>$errors]); 
        }
    }
    

    }

    public function delete($id)
    {
        // echo $id;
        $mod=new Vandormodel();
        $vendorDATA= $mod->find($id);
        $old_img=$vendorDATA["image"];
        if(file_exists('vendor/'.$old_img))
        {
            @unlink('vendor/'.$old_img);
        }
        $DELETE= $mod->delete($id);
        if($DELETE){
            echo'data delete';
        }
        else {
         echo'data not delete';
        }
    }
}
?>