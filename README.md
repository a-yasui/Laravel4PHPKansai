# PHPKansai 2013/12/21

Laravel4 のmemo project

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
