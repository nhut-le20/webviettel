-- Fix schema: đảm bảo cột `service` tồn tại trong bảng contacts
-- Chạy trong phpMyAdmin/MySQL client trong DB `webviettel`

USE webviettel;

ALTER TABLE `contacts`
  ADD COLUMN IF NOT EXISTS `service` VARCHAR(255) NOT NULL DEFAULT ''
;

