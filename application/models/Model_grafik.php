<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_grafik extends CI_Model{
   function qry_jumlah_tujuan() {
      $data = $this->db->query("
      SELECT tbl_jadwal.wilayah_jadwal as tujuan, COUNT(tbl_order.kd_jadwal) as jumlah
      FROM tbl_order
      LEFT JOIN tbl_jadwal
      ON tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal
      WHERE tbl_order.status_order=2  
      GROUP BY tujuan");
      return $data->result();
   }
} 