<?php

class MyTask {

  private $id;
  private $title;
  private $description;
  private $user_id;
  private $due_date;
  private $priority;
  private $status;

  public function __construct($id = null) {
    if ($id) {
      $this->load($id);
    }
  }

  public function load($id) {
    $sql = 'SELECT * FROM mytasks WHERE id = :id';
    $result = Db::query($sql, array(':id' => $id));
    if ($result) {
      $row = $result->fetch();
      $this->id = $row['id'];
      $this->title = $row['title'];
      $this->description = $row['description'];
      $this->user_id = $row['user_id'];
      $this->due_date = $row['due_date'];
      $this->priority = $row['priority'];
      $this->status = $row['status'];
    }
  }

  public function save() {
    if ($this->id) {
      $sql = 'UPDATE mytasks SET title = :title, description = :description, user_id = :user_id, due_date = :due_date, priority = :priority, status = :status WHERE id = :id';
      $result = Db::query($sql, array(
        ':id' => $this->id,
        ':title' => $this->title,
        ':description' => $this->description,
        ':user_id' => $this->user_id,
        ':due_date' => $this->due_date,
        ':priority' => $this->priority,
        ':status' => $this->status,
      ));
    } else {
      $sql = 'INSERT INTO mytasks (title, description, user_id, due_date, priority, status) VALUES (:title, :description, :user_id, :due_date, :priority, :status)';
      $result = Db::query($sql, array(
        ':title' => $this->title,
        ':description' => $this->description,
        ':user_id' => $this->user_id,
        ':due_date' => $this->due_date,
        ':priority' => $this->priority,
        ':status' => $this->status,
      ));
      $this->id = Db::lastInsertId();
    }
  }

  public function delete() {
    $sql = 'DELETE FROM mytasks WHERE id = :id';
    Db::query($sql, array(':id' => $this->id));
  }

  // Getters and setters

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function getUserId() {
    return $this->user_id;
  }

  public function setUserId($user_id) {
    $this->user_id = $user_id;
  }

  public function getDueDate() {
    return $this->due_date;
  }

  public function setDueDate($due_date) {
    $this->due_date = $due_date;
  }

  public function getPriority() {
    return $this->priority;
  }

  public function setPriority($priority) {
    $this->priority = $priority;
  }

  public function getStatus() {
    return $this->status;
  }

  public function setStatus($status) {
    $this->status = $status;
  }

}

