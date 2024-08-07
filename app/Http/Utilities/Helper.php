<?php
    use App\Http\Utilities\Constant;

    function getPriority($value) {
        $priorities = Constant::PRIORITIES;
        $filtered = array_filter($priorities, function($priority) use ($value) {
            return $priority['key'] == $value;
        });
        return !empty($filtered) ? reset($filtered)['value'] : null;
    }
    
?>