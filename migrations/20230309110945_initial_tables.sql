create table if not exists products(
    id integer primary key,
    product_name varchar(200),
    product_description text,
    product_image text,
    price float,
    in_stock integer
);

create table if not exists product_attributes(
    id integer primary key,
    product_id integer,
    attribute_name varchar(50),
    attribute_order integer,
    foreign key (product_id)
        references products (id)
            on delete cascade 
            on update no action

);

create table if not exists product_attribute_values(
    id integer primary key,
    product_attribute_id integer,
    attribute_value varchar(50),
    attribute_value_order integer,
    foreign key (product_attribute_id)
        references product_attributes (id)
            on delete cascade 
            on update no action

);

create table if not exists product_skus(
    id integer primary key,
    product_id integer,
    sku_price float,
    sku_name varchar(50),
    sku_barcode varchar(50),
    sku_stock integer,
    foreign key (product_id)
        references products (id)
            on delete cascade
            on update no action

);

create table if not exists product_variants(
    product_id integer,
    sku_id integer,
    attribute_id integer,
    attribute_value_id integer,

    foreign key (product_id)
    references products (id)
    on delete cascade
    on update no action,
    foreign key (sku_id)
        references product_skus (id)
            on delete cascade
            on update no action,

    foreign key (attribute_id)
        references product_attributes (id)
            on delete cascade
            on update no action,
    foreign key (attribute_value_id)
        references product_attribute_values (id)
            on delete cascade
            on update no action
);

create table if not exists category(
    id integer primary key
);