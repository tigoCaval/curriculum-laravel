<?php 
namespace App\Domain\Traits;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

trait CourseTrait
{


    /**
     * Display course of the authenticated user
     * Exibir cursos do usuário autenticado
     * @param int $page
     * 
     * @return [type]
     */
    public function courseAuth($page)
    {
        return Course::where('user_id',Auth::user()->id)->orderBy('course_type_id','DESC')->paginate($page);  
    }

    /**
     * Store a newly created resource in storage.
     * Armazenar um recurso recém-criado no armazenamento.
     * @param array $data
     * 
     * @return [type]
     */
    public function createCourse(array $data)
    {
       $collection = [
            'user_id'=>Auth::user()->id, 
            'course_type_id'=>$data['course_type'], 
            'course_status_id'=>$data['course_status'], 
            'description'=>$data['course_name'], 
            'institution'=>$data['institution'],
            'country'=>$data['country'], 
            'uf'=>$data['uf'],
            'city'=>$data['city'],
            'start'=> $data['start'],
            'end'=>$data['end']
       ]; 
       return Course::create($collection);       
    }
    
    /**
    * Update the specified resource in storage
    * Atualizar o recurso especificado no armazenamento
    * @param array $data
    * @param Course $course
    * 
    * @return [type]
    */
   public function updateCourse(array $data, Course $course)
   {
       if(Auth::user()->id == $course->user_id){
            $collection = [
                'course_type_id'=>$data['course_type'], 
                'course_status_id'=>$data['course_status'], 
                'description'=>$data['course_name'], 
                'institution'=>$data['institution'],
                'country'=>$data['country'], 
                'uf'=>$data['uf'],
                'city'=>$data['city'],
                'start'=>$data['start'],
                'end'=>$data['end']
            ]; 
            return $course->update($collection);
       }
       return exit('oops something went wrong !');  
   }

   /**
    * Remove the specified resource from storage.
    * Excluir o recurso especificado do armazenamento.
    * @param Course $course
    * 
    * @return [type]
    */
    public function deleteCourse(Course $course)
    {
        return Auth::user()->id == $course->user_id ? $course->delete() : exit('oops something went wrong !'); 
    }

   
   /**
    * CHECK the amount of records made,
    * create a limit on the number of records and return a Boolean value.
    * Verificar a quantidade de registros efetuados, 
    * criar um limite de quantidade de registros e retornar um valor booleano.
    * @return bool
    */
    public function countCourse() 
    {
        $limit = 20;  
        $count = Course::where('user_id',Auth::user()->id)->count();
        return $count < $limit ?  true : false;      
    }
 

}