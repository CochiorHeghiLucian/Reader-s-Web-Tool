<?php
	class Controller{
		
		public function model($model){

			require_once '../APP/MODELS/'.$model.'.php';

			return new $model();
		}

		public function view($view, $data=[]){

			require_once '../APP/VIEWS/'.$view.'.php';
		}
	}
?>