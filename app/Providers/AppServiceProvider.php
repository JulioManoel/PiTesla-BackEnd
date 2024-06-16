<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\Requests\{IRequest, ActivitieRequest, AnswerOptionRequest, CourseRequest, DisciplineRequest, ExerciseRequest, SchoolRequest, StudentRequest, TeacherRequest};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IRequest::class, function ($app) {
            $routeMappings = [
                'school.store' => SchoolRequest::class,
                'school.update' => SchoolRequest::class,
                'student.store' => StudentRequest::class,
                'student.update' => StudentRequest::class,
                'teacher.store' => TeacherRequest::class,
                'teacher.update' => TeacherRequest::class,
                'discipline.store' => DisciplineRequest::class,
                'discipline.update' => DisciplineRequest::class,
                'course.store' => CourseRequest::class,
                'course.update' => CourseRequest::class,
                'activitie.store' => ActivitieRequest::class,
                'activitie.update' => ActivitieRequest::class,
                'test.store' => CourseRequest::class,
                'test.update' => CourseRequest::class,
                'exercise.store' => ExerciseRequest::class,
                'exercise.update' => ExerciseRequest::class,
                'answerOption.store' => AnswerOptionRequest::class,
                'answerOption.update' => AnswerOptionRequest::class,
            ];

            $currentRoute = $app->make(Request::class)->route()->getName();
            if (array_key_exists($currentRoute, $routeMappings)) {
                return new $routeMappings[$currentRoute];
            }

            throw new \Exception('Implementation not found for route');
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
