create table if not exists booking.booking
(
    idx              int auto_increment
    primary key,
    booking_code     varchar(22)                                          not null comment '예역 확인',
    member_code      varchar(22)                                          not null comment '예약 멤버',
    room_code        varchar(22)                                          not null,
    start_date       datetime                                             null comment '예약 시작',
    end_date         datetime                                             null comment '마지막 얘약 날짜',
    people           int                                                  null comment '인원',
    price            decimal(14, 4)                                       null,
    room_member_code varchar(22)                                          null comment '방 주인 멤버 코드',
    booking_status   enum ('incomplete', 'complete') default 'incomplete' not null comment '방 사용 여부'
    )
    comment '예약';

create index booking_index
    on booking.booking (booking_code);


create table if not exists booking.bookmark
(
    idx           int auto_increment
    primary key,
    bookmark_code varchar(22) not null comment '북마크 코드',
    member_code   varchar(22) not null comment '멤버 코드',
    room_code     varchar(22) not null
    )
    comment '찜하기';

create index bookmark_index
    on booking.bookmark (bookmark_code);

create index member_code
    on booking.bookmark (member_code);


create table if not exists booking.comment
(
    comment_code        varchar(22)                        null comment '댓글 코드',
    member_code         varchar(22)                        null comment '글쓴이 코드',
    room_code           varchar(22)                        null comment '방코드',
    idx                 int auto_increment
    primary key,
    comment             text                               not null comment '댓글 내용',
    create_date         datetime default CURRENT_TIMESTAMP null,
    parent_comment_code varchar(22)                        null comment '부모 댓글 코드
'
    )
    comment '후기';

create index command_index
    on booking.comment (comment_code);

create table if not exists booking.member
(
    idx           int auto_increment
    primary key,
    member_code   varchar(22)                               not null,
    email         varchar(122)                              not null comment '이메일',
    name          varchar(22)                               not null comment '이름',
    phone_number  varchar(22)                               null comment '휴대폰 번호',
    password      varchar(100)                              not null,
    type          enum ('basic', 'manager') default 'basic' not null,
    certification enum ('Y', 'N')           default 'N'     not null
    )
    comment '멤버';

create index member_code
    on booking.member (member_code);

create index member_index
    on booking.member (member_code);

create table if not exists booking.`order`
(
    idx         int auto_increment
    primary key,
    order_code  varchar(22)                        not null comment '주문번호 키
',
    room_code   varchar(22)                        not null,
    start_date  datetime default CURRENT_TIMESTAMP null,
    end_date    datetime default CURRENT_TIMESTAMP null,
    member_code varchar(22)                        not null,
    price       decimal(14, 4)                     not null,
    create_date datetime default CURRENT_TIMESTAMP null,
    people      int                                null,
    constraint order_id
    unique (order_code)
    );

create table if not exists booking.room
(
    idx         int auto_increment
    primary key,
    room_code   varchar(22)                        not null comment '방 코드',
    address     varchar(100)                       not null comment '주소',
    max_people  int                                not null comment '최대 인원',
    price       decimal(14, 4)                     not null comment '가격',
    create_date datetime                           not null,
    img         varchar(100)                       null comment '이미지',
    member_code varchar(22)                        null comment '등록 회원',
    name        varchar(22)                        not null,
    type        enum ('motel', 'hotel', 'pension') null,
    views       int                                not null
    );

create index room
    on booking.room (room_code)
    comment 'room';

create index room_index
    on booking.room (room_code);