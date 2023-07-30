# php_web_api
step 1 : clone source code </br>
-------
  - clone source code về máy,đặt tại thư mục root của xamp </br>

step 2 : SETUP THE DATABASE
-------
  - sử dụng phpmyadmin, tạo database 'healthy' </br>
  - sau đó chọn tệp healthy.sql import vào database 'healthy'.  </br>
  - hoặc có thể chạy trực tiếp lệnh sql trong file healthy.sql  </br>

step 3 :config môi trường
-------
  - mở file data_config.php </br>
  - sửa lại username và password của mysql cho chuẩn </br>
    [đoạn code sau : </br>
      private $host = "localhost"; </br>
      private $db_name = "healthy"; </br>
      private $username = "root"; </br>
      private $password = " "; </br>
    ] </br>

step 4 : chạy thử 
-------
  - chạy xamp và start apache và mysql lên </br>
  - truy cập các linh sau trên trình duyệt để kiểm tra kết quả lấy thông tin người sử dụng.  </br>
    http://localhost/02_code/recommended/list.php </br>
    ![recommended/list](recommended_api.png)
    chú ý : sửa localhost thành ServerName của bạn  </br>
  - sử dụng postman hoặc 1 tool nào đó ..... gửi 1 post request tới link sau để thực hiện new a recode </br>
    http://localhost/02_code/user/create.php với data là : </br>
      [ </br>
      "email" => "an12@gmail.com", </br>
      "name" => "an", </br>
      "permision" => "1", </br>
      ]
  - sử dụng postman hoặc 1 tool nào đó ..... gửi 1 post request tới link sau để thực hiện update: </br>
    http://localhost/02_code/user/update.php?id=1 với data là : </br>
      [ </br>
      "name" => "an", </br>
      "permision" => "2", </br>
      ]
