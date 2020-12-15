<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Address;
use App\Models\Contact;
use App\Models\Summary;
use App\Models\Document;
use App\Models\Language;
use App\Models\Education;
use App\Models\Objective;
use App\Models\Experience;
use App\Policies\CoursePolicy;
use App\Policies\AddressPolicy;
use App\Policies\ContactPolicy;
use App\Policies\SummaryPolicy;
use App\Policies\DocumentPolicy;
use App\Policies\LanguagePolicy;
use App\Policies\EducationPolicy;
use App\Policies\ObjectivePolicy;
use App\Policies\ExperiencePolicy;
use App\Models\PersonalInformation;
use App\Policies\PersonalInformationPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
 

class CurriculumServiceProvider extends ServiceProvider
{

      /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
    
        PersonalInformation::class => PersonalInformationPolicy::class,
        Contact::class => ContactPolicy::class, 
        Address::class => AddressPolicy::class,  
        Document::class => DocumentPolicy::class, 
        Education::class => EducationPolicy::class,  
        Course::class => CoursePolicy::class, 
        Experience::class => ExperiencePolicy::class,   
        Language::class => LanguagePolicy::class,
        Objective::class => ObjectivePolicy::class, 
        Summary::class => SummaryPolicy::class, 

    ];


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
