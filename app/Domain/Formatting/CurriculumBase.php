<?php
namespace App\Domain\Formatting;

use App\Models\Course;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Summary;
use App\Models\Document;
use App\Models\Language;
use App\Models\Education;
use App\Models\Objective;
use App\Domain\Formatting\DateBr;
use App\Models\Experience;
use App\Models\PersonalInformation;


/**
 * Estrutura do currículo 
 */
class CurriculumBase
{

   /**
    * Obter currículo / Get curriculum
    * @return string
    */
   public function getCurriculum()
   {
      $text = $this->introduction();
      $text .= $this->contact(); 
      $text .= $this->address();
      $text .= $this->objective();
      $text .= $this->summary();
      $text .= $this->education();
      $text .= $this->course(); 
      $text .= $this->language();  
      $text .= $this->experience(); 
      return $text;
   }

   /**
    * Obter informação introdutória do currículo
    * [Personal Information, document]
    * @access private
    * @return string
    */
   private function introduction()
   {
      $date = new DateBr();
      $personalInfo = new PersonalInformation();
      $personal = $personalInfo->findInfoAuth();
      $document = new Document();
      $doc = $document->findDocumentAuth();

      $text = "<meta charset='utf-8'/>";
      $text .= empty($doc->full_name) ? '' : "<h3 style='text-align:center; font-family: Arial, Helvetica, sans-serif;'>".$doc->full_name."</h3>";
      $text .= empty($doc->nationality) ? "" : " ".$doc->nationality;
      $text .= empty($doc->place_birth) ? "" : ", ".$doc->place_birth;
      $text .= empty($doc->date_birth) ? "" : ", ".$date->dateAge($doc->date_birth); 
      $text .= empty($personal->gender->description) ? "" : ", ".$personal->gender->description; 
      $text .= empty($personal->maritalStatus->description) ? "" : ", ".$personal->maritalStatus->description;
      $text .= empty($doc->driverLicense->description) ? "" : ", <strong>CNH:</strong> ".$doc->driverLicense->description;
      return $text;
   }


   /**
    * Obter contato / Get contact
    * @access private
    * @return string
    */
   private function contact()
   {
      $contact = new Contact();
      $contact = $contact->findContactAuth();
      $text  = empty($contact) ? "" : "<br><strong>Contato:</strong>";
      $text .= empty($contact->phone) ? '' : ' '.$contact->phone;
      $text .= empty($contact->phone_message) ? '' : ' | '.$contact->phone_message; 
      $text .= empty($contact->email) ? "" : ", ".$contact->email;
      return $text;
   }


   /**
    * Obter endereço / Get Address
    * @access private
    * @return string
    */
   private function address()
   {
      $address = new Address();
      $address = $address->findAddressAuth();
      $text = empty($address) ? "" : "<br><strong>Endereço:</strong>";
      $text .= empty($address->city) ? '' : ', '.$address->city;
      $text .= empty($address->uf) ? '' : ', '.$address->uf;
      $text .= empty($address->country) ? '' : ', '.$address->country; 
      $text .= empty($address->address) ? '' : '; '.$address->address;
      $text .= empty($address->neighborhood) ? '' : ', '.$address->neighborhood;
      $text .= "<hr>";
      return $text;
   }


   /**
    * Obter Objective / Get objective
    * @access private
    * @return string
    */
   private function objective()
   {
      $objective = new Objective();
      $objective = $objective->findObjectiveAuth();
      $text  = empty($objective) ? "" : "<strong>Objetivos</strong><br>";
      $text .= empty($objective->description) ? '' : ' '.$objective->description;
      return $text;
   }

   /**
    * Obter resumo / Get summary
    * @access private
    * @return string
    */
   private function summary()
   {
      $summary = new Summary();
      $summary = $summary->findSummaryAuth();
      $text = empty($summary) ? "" : "<br><br><strong>Resumo</strong><br>"; 
      $text .= empty($summary->description) ? '' : ' '.$summary->description;
      return $text;
   }

   /**
    * Obter educação / Get Education
    * @access private
    * @return string
    */
   private function education()
   {
      $education = new Education();
      $education = $education->findEducationAuth();
      $text = empty($education) ? "" : "<br><br><strong>FORMAÇÃO</strong><br>";
      $text .= empty($education->educationCourse->description) ? '' : 'Escolaridade: '.$education->educationCourse->description; 
      return $text;
   }


   /**
    * Obter cursos / Get course
    * @access private
    * @return string
    */
   private function course()
   {
      $date = new DateBr();
      $course = new Course();
      $course = $course->courseAuth(0); 
      $text = "";
      foreach($course as $item){
         $text .= empty($item->CourseType->description) ? '' : '<br><br><strong>'.$item->CourseType->description.'</strong><br>';
         $text .= empty($item->description) ? '' : ' '.$item->description;
         $text .= empty($item->institution) ? '' : ' - '.$item->institution;
         $text .= empty($item->start) ? '' : '<br> '.$date->convert($item->start);
         $text .= empty($item->end) ? '' : ' - '.$date->convert($item->end);
         $text .= empty($item->courseStatus->description) ? '' : ' - '.$item->courseStatus->description;
      }
      return $text;
   }

  
   /**
    * Get idiomas / Get language
    * @access private
    * @return string
    */
   private  function language()
   {
      $language = new Language();
      $language = $language->languageAuth(0);
      $text = "<br><br>"; 
      $text .= "<table style='width:100%'>";
      $text .= "<tr>"; 
      $text .= count($language) == 0 ? "" : "<th style='text-align: left;'>Idioma</th>";
      $text .= count($language) == 0? "" : "<th style='text-align: left;'>Leitura</th>";
      $text .= count($language) == 0 ? "" : "<th style='text-align: left;'>Escrita</th>";
      $text .= count($language) == 0 ? "" : "<th style='text-align: left;'>Conversação</th>";
      $text .= "</tr>";
      foreach($language as $item){
         $text .= "<tr>";
         $text .=  empty($item->description) ? '' : '<td>'.$item->description.'</td>'; 
         $text .=  empty($item->readingLanguage->description) ? '' : '<td>'.$item->readingLanguage->description.'</td>';
         $text .=  empty($item->writingLanguage->description) ? '' : '<td>'.$item->writingLanguage->description.'</td>';
         $text .=  empty($item->speakLanguage->description) ? '' : '<td>'.$item->speakLanguage->description.'</td>';
         $text .= "</tr>";
      }
      $text .= "</table>";
      return $text;
   } 

   /**
    * Get experiência / Get experience
    * @access private
    * @return string
    */
   private function experience()
   {
       $experience = new Experience();
       $experience = $experience->experienceAuth(0);  
       $date = new DateBr();
       $text = "<br>";
       $text .= count($experience) == 0 ? "" : "<strong>EXPERIÊNCIA PROFISSIONAL </strong><br>";   
       foreach($experience as $item){
         $text .= "<br>";
         $text .=  empty($item->company) ? '' : ''.$item->company;   
         $text .= empty($item->location) ? '' : ' - '.$item->location;   
         $text .= empty($item->job_title) ? '' : '<br> '.$item->job_title;   
         $text .= empty($item->start) ? '' : ' - '.$date->dateMonthYear($item->start);   
         $text .= empty($item->start) ? '' : ' a '.$date->dateMonthYear($item->end);  
         $text .= empty($item->description) ? '' : '<br>'.$item->description; 
         $text .= "<br>";
       }
       return $text;
   }

}