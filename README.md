## 作答內容
* 時間限制：約下午五點多收到考題，隔天下午三點多收到面試通知
## 使用seed製造的假資料
![alt text](https://github.com/monkeypg/monkeypg.github.io/blob/master/img/books-API/db-data.png)

## 使用Postman讀 api/books
![alt text](https://github.com/monkeypg/monkeypg.github.io/blob/master/img/books-API/books.png)

## 使用Postman讀 api/books/3
![alt text](https://github.com/monkeypg/monkeypg.github.io/blob/master/img/books-API/get-book-id.png)

## 使用Postman新增一筆資料 api/books/
- 這邊因為Laravel有防止跨站腳本攻擊，所以先把app\Http\Kernel.php裡面的App\Http\Middleware\VerifyCsrfToken::class這行註解掉
才方便用Postman來做post資料的動作
![alt text](https://github.com/monkeypg/monkeypg.github.io/blob/master/img/books-API/post-books.png)

## 使用Postman更新 api/books/50
![alt text](https://github.com/monkeypg/monkeypg.github.io/blob/master/img/books-API/put-book-id.png)

## 使用Postman刪除 api/books/5
- postman的status設為204
- 程式碼為 return response()->json(null, 204)
![alt text](https://github.com/monkeypg/monkeypg.github.io/blob/master/img/books-API/del-book-id.png)

## 還可以更完善之處
Implementing OAuth authorization using Laravel Passport
來不及實作，大致流程如下：
- We create a client in our OAuth server that represents our app
- The user enters username + password in the login screen and sends it to the API
- The API sends the username + password + client ID + client secret to the OAuth server
- The API saves the refresh token in a HttpOnly cookie
- The API sends the access token to the client
- The client saves the access token in storage, for instance a browser app saves it in localStorage
- The client requests something from the API attaching the access token to the request's Authorization header
- The API sends the access token to the OAuth server for validation
- The API sends the requested resource back to the client
- When the access token expires the client request the API for a new token
- The API sends the request token to the OAuth server for validation
- If valid, steps 4-6 repeats
- 備註：save the refresh token as a HttpOnly cookie is to prevent Cross-site scripting (XSS) attacks

## 其他
- 這邊因為規模比較小，所以就把查詢資料的部分寫在Controller，但若大型一點的狀況，我是會分Repository和Service的軟體架構出來，不會全部寫在Controller
- 因為是設計API，所以就沒有用到view相關的blade語法，可參考我GitHub其他Laravel專案的寫法（都是side project）
- isbn為何會想要用integer來設計呢？

# 程式考題規格
# laravel-books-API
This is restful API design specification for books resource operation
Please develop an API for **books** resource operation by following specification.

## resource attribute

| name             | data type                         |
| ---------------- | --------------------------------- |
| book_id          | integer, auto incremental         |
| book_name        | string, maximum length 100 chars  |
| book_description | string, maximum length 2000 chars |
| book_author      | string, maximum length 100 chars  |
| isbn             | integer, 13 digit                 |
| created_at       | linux timestamp                   |
| updated_at       | linux timestamp                   |

## supported methods
### Create a book profile
method: `POST /books`  
request example:  
```json  
{
    "book_name": "Student Cookbook For Dummies",
    "book_description": "Are you a student who s fed up with making do with greasy food and monotonous ingredients? A parent who worries about your son or daughter s mounting tendency to nip to the fast–food van at all times of the day",
    "book_author": 9,
    "isbn": 978986181728,
    "created_at": "1511862794",
    "updated_at": "1511862794"
}
```

response example:  
```json  
{
    "code": 0,
    "message": "The book has been created"
}
```

### Retrieve a book profile
method: `
GET /books/{book_id}`

response:
```json  
{
    "book_id": 1239,
    "book_name": "Student Cookbook For Dummies",
    "book_description": "Are you a student who s fed up with making do with greasy food and monotonous ingredients? A parent who worries about your son or daughter s mounting tendency to nip to the fast–food van at all times of the day",
    "book_author": 9,
    "isbn": 978986181728,
    "created_at": "1511862794",
    "updated_at": "1511862794"
}
```

### Update a book's profile
Please design it by yourself

### Delete a book's profile
Please design it by yourself

## notes
- Please follow the standard resultful API guideline
- Please use middleware for data validation
- Please use laravel migration to create resource DB.
- Anything not mention in this readme,just do it in your own way.

