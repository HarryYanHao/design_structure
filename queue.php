<?php
Class Queue{
	protected $front;
	protected $rear;
	protected $queue;
	protected $length;
	protected $next;

	/**
	 * Queue construct.
	 *
	 * @param  int   $length
	 */
	public function __construct($length){
		$this->length = (int)$length;
		$this->queue = [];
		$this->front = 0;
		$this->rear = 0;
		$this->next = 0;
	}

	/**
	 * Determine whether the queue is empty
	 *
	 * @return boolean
	 */
	public function isEmpty(){
		return $this->front == $this->rear;
	}

	/**
	 * Determine whether the queue is full
	 *
	 * @return boolean
	 */
	public function isFull(){
		return $this->rear - $this->front == $this->length;
	}

	/**
	 * get current queue value
	 *
	 * @return mixed
	 */
	public function current(){
		return $this->isEmpty()? -1 : $this->queue[$this->next];
	}

	/**
	 * get next queue value
	 *
	 * @return mixed
	 */
	public function next(){
		$this->next ++ ;
		if(!isset($this->queue[$this->next])){
			return null;
		}
		return $this->queue[$this->next];
	}

	/**
	 * set queue value
	 *
	 * @param  mixed   $value
	 *
	 * @return mixed
	 */
	public function push($value){
		if($this->isFull()){
			return false;
		}
		$this->queue[$this->rear] = $value;
		$this->rear++;
		return true;
	}

	/**
	 * get queue value and del from queue
	 *
	 *
	 * @return mixed
	 */
	public function pop(){
		if($this->isEmpty()){
			return null;
		}
		$value = $this->queue[$this->front];
		$this->rear-- ;
		for($i = 1;$i <= $this->rear ; $i++){
			$this->queue[$i-1] = $this->queue[$i];
		}
		unset($this->queue[$this->rear]);
		return $value;
	}

	/**
	 * get queue list as array
	 *
	 *
	 * @return array
	 */
	public function getQueue(){
		return $this->queue;
	}




}