<?php
Class Queue{
	/**
     * Initialize your data structure here. Set the size of the queue to be k.
     * @param Integer $k
     */
    function __construct($k) {
        $this->length = (int)$k;
		$this->queue = [];
		$this->front = 0;
		$this->rear = 0;
		$this->next = 0;
    }
  
    /**
     * Insert an element into the circular queue. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function enQueue($value) {
        if($this->isFull()){
			return false;
		}
		$this->queue[$this->rear] = $value;
		$this->rear++;
		return true;
    }
  
    /**
     * Delete an element from the circular queue. Return true if the operation is successful.
     * @return Boolean
     */
    function deQueue() {
        if($this->isEmpty()){
			return false;
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
     * Get the front item from the queue.
     * @return Integer
     */
    function Front() {
        return isset($this->queue[$this->front])?$this->queue[$this->front]:-1;
    }
  
    /**
     * Get the last item from the queue.
     * @return Integer
     */
    function Rear() {
        return isset($this->queue[$this->rear - 1])?$this->queue[$this->rear - 1]:-1;
    }
  
    /**
     * Checks whether the circular queue is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return $this->front == $this->rear;
    }
  
    /**
     * Checks whether the circular queue is full or not.
     * @return Boolean
     */
    function isFull() {
        return $this->rear - $this->front == $this->length;
    }




}