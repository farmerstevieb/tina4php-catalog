create table if not exists product(
    id integer primary key
);

create table if not exists product_attribute_type(
    id integer primary key,
    product_id integer,
    foreign key (product_id)
        references product (id)
            on delete cascade 
            on update no action
);

create table if not exists product_attribute_value(
    id integer primary key,
    product_attribute_type_id integer,
    foreign key (product_attribute_type_id)
        references product_attribute_type (id)
            on delete cascade 
            on update no action
);

create table if not exists category(
    id integer primary key
);