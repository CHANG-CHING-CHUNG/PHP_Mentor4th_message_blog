# PHP 部落格
* 這是 Lidemy 程式導師計劃第4期的作業
* [部落格網址](https://www.mentor4th-john.tw/blog/index.php?page=index)
![](https://i.imgur.com/eEinzvy.jpg)


## 後端
* 使用 mysqli & mysqli_real_escape_string 存取資料庫
```
function esc(String $value) {
    global $conn;

    $val = trim($value);
    $val = mysqli_real_escape_string($conn, $value);

    return $val;
  }

  function getUser($username, $password) {
    global $conn;
    $sql = "SELECT * FROM John_blog_users WHERE username='$username' and password='$password'";

    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    
    return $user;
  }
```
上面範例包含了 esc 及 getUser 函式， esc 將傳進來的值做 mysqli_real_escape_string 轉義之後再將轉義後的值傳進 getUser 函式下 query，以防止 SQL Injection。
* 使用 MySQL 關聯式資料庫，將類別存成一個 TABLE 以及文章存成一個 TABLE，再建立一個 post 對應 topic 的 TABLE  使用類別 id 及 post id 做一對多關聯。
* 
## 使用者登入系統
* 使用 session 驗證使用者登入。
* 登入畫面
![](https://i.imgur.com/VlBdXZH.png)
* 登入後導向管理後台
![](https://i.imgur.com/lwmGnOH.png)

## 管理後台

### 功能
* 新增文章: 串了 CKEditor 所見即所得編輯器 API
![](https://i.imgur.com/BRhhTTH.png)
* 管理文章: 列出目前所有文章，可編輯、刪除文章
![](https://i.imgur.com/lghOIId.png)
* 管理類別: 列出目前所有類別，可編輯、刪除類別
![](https://i.imgur.com/AE1aN3U.png)
* 編輯文章: 編輯文章畫面
![](https://i.imgur.com/gAwELPs.png)
* 刪除文章: 在管理文章頁面按下文章右邊![](https://i.imgur.com/uSuQQ9N.png)圖示即可刪除文章

## 前台
### 首頁
* 列出所有文章
![](https://i.imgur.com/nmqTU9c.png)
### 文章列表
* 列出最新的5篇文章
* 有分頁功能
* ![](https://i.imgur.com/0YZ9PmV.png)
### 單一文章頁面
* 文章圖片左上為該文章類別
* 右側主題區塊可直接導向該類別文章列表
![](https://i.imgur.com/ul5zGqe.png)
### 分類專區
* 列出目前的主題類別
![](https://i.imgur.com/mAQTdB9.jpg)
* 點下主題類別後列出該主題之最新5篇文章，有分頁功能
![](https://i.imgur.com/RTN2uRi.png)
### 關於我
* 列出部落格主人的自我介紹








