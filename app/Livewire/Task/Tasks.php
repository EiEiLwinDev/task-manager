<?php

namespace App\Livewire\Task;

use App\Http\Utilities\Constant;
use Livewire\Component;
use App\Models\Task;

class Tasks extends Component
{
    /** form value */
    public $tasks = [], $title, $project, $priority, $task_id;

    /** constants */
    public $projects, $priorities;

    /** filter */
    public $selectedProject;

    /** modal */
    public $isOpen = 0;

    public function render()
    {
        $this->projects  = Constant::PROJECTS;
        $this->priorities = Constant::PRIORITIES;
        $this->loadTasks();
        return view('livewire.task.tasks');
    }

    public function loadTasks(){
        $query = Task::query();
        if($this->selectedProject){
            $query->where('project', $this->selectedProject);
        }
        $this->tasks = $query->orderBy('order', 'asc')->orderBy('priority', 'asc')->get();
    }

    /** create form open */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    /** open modal */
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    /** close modal */
    public function closeModal()
    {
        $this->isOpen = false;
    }
  
    private function resetInputFields(){
        $this->title = '';
        $this->project= '';
        $this->priority = '';
        $this->order = 0;
        $this->task_id = '';
    }
     
    /** create */
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'project' => 'required'
        ]);
   
        Task::updateOrCreate(['id' => $this->task_id], [
            'title' => $this->title,
            'project' => $this->project,
            'priority' => $this->priority
        ]);
  
        session()->flash('message', 
            $this->task_id ? 'Task Updated Successfully.' : 'Task Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }
  
    /** edit form open*/
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->task_id = $id;
        $this->title = $task->title;
        $this->project = $task->project;
        $this->priority = $task->priority; 
    
        $this->openModal();
    }
     
    /** delete */
    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('message', 'Task is deleted successfully.');
    }

    public function updateTaskOrder($items)
    {   
        foreach ($items as $item) {
            Task::find($item['value'])->update(['order' => $item['order']]);
        }
    }

    public function changeProject()
    {
        $this->loadTasks();
    }
}
