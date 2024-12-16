<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
  
    protected $table            = 'notifications';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'message', 'created_at', 'read_status'];

    // Dates
    protected $useTimestamps = true;


   // Get notifications for a user
   public function getNotifications($user_id)
   {
       return $this->where('user_id', $user_id)
                   ->orderBy('created_at', 'DESC')
                   ->findAll();
   }

   // Get unread notifications count
   public function getUnreadCount($user_id)
   {
       return $this->where(['user_id' => $user_id, 'read_status' => 0])
                   ->countAllResults();
   }

   // Mark notifications as read
   public function markAsRead($user_id)
   {
       return $this->set('read_status', 1)
                   ->where('user_id', $user_id)
                   ->update();
   }
}
