## Task Test Edilmesi

Aşağıdaki komutların sırasıyla çalıştırılması gerekmektedir.

    cp .env.example .env
    docker-compose up -d
    docker exec -it case sh
    composer install
    php artisan migrate

#### Kategori CRUD İşlemleri için oluşturulan URL

    http://localhost:8001/admin/categories

#### Blog CRUD İşlemleri için oluşturulan URL

    http://localhost:8001/admin/blogs

#### Kullanıcı tarafı blog sayfası

    http://localhost:8001/blogs

#### Kullanıcı tarafı kategori sayfası

    http://localhost:8001/categories
