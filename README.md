# PHPKansai 2013/12/21

Laravel4 のmemo project

About write this: http://qiita.com/a_yasui/items/0b32b7e9a874d8228aaa

# Install

> curl -sS https://getcomposer.org/installer | php

- User
-- name
-- email
-- password

- Blog
-- user_id
-- title
-- description

- Post
-- blog_id
-- title
-- story

- Comment
-- post_id
-- name
-- email
-- comment


# URL Mapping ? Maping ?

/ => lambda
/user => User@index
/blog/ => Blog@index
/<title>/ => Blog@story
/edit/<title> => Blog@edit
