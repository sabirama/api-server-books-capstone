Route Paths

--
User paths

post:
/register
/login

authenticated paths

post:
/logout

get:
/user/{id}
--

--
Books paths

get:
/books --return all books
/books:bylatest --return books by latest
/books:byname --return books by name
/books/{id} --return individual book

authenticated paths

post:
/books --add new book to database

put:
/books/{id} --update a books properties in the database

delete:
/books/{id} --remove a book from the database
--

--
Author paths

get:
/authors --return all authors
/authors:byname --return authors by name
/authors/{id} --return individual author

authenticated paths

post:
/authors --add new author to database

put:
/authors/{id} --return individual author to database

delete:
/authors/{id} --remove author from database
--

--
Genre paths

get:
/genres --return all genres
/genres:byname --return genres by name
/genres/{id} --return a specific genre

authenticated paths

post:
/genres --add new genre to database

put:
/genres/{id} --edit genre property in the database

delete:
/genres/{id} --remove a genre from database
--

--
Order paths

get:
/order --return all order
/order:by-user-id --return order by 'user_id'
/order/{userId} --return a specific user order
/order/{userId}/{id} --return a specific order using 'user_id' and 'order_id'

authenticated paths

post:
/order --add new order to database

put:
/order/{id} --edit order property in the database

delete:
/order/{id} --remove a order from database
