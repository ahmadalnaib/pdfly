<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Plan;
 
class PlanComposer {
    
    public function compose(View $view) {
        return $view->with('plans', Plan::all());
    }
    
}