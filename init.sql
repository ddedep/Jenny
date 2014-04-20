CREATE FUNCTION generate_salt(p_length integer) RETURNS text
  AS $_$
    DECLARE
      characters text[] := '{0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z}';
      result text := '';
      i integer := 0;
    BEGIN
      IF $1 < 0 THEN
        RAISE EXCEPTION 'Given length cannot be less than 0';
      END IF;

      FOR i IN 1..$1 LOOP
        result := result || characters[1+random()*(array_length(characters, 1)-1)];
      END LOOP;
      return result;
    END;
  $_$
LANGUAGE plpgsql;

CREATE TABLE persons AS (
  personid integer primary key,
  lastname varchar(32) NOT NULL,
  firstname varchar(32) NOT NULL,
  middlename varchar(32),
  phonenum varchar (32) NOT NULL,
  insertedon timestamp default now()
);

CREATE TABLE users AS (
  userid integer primary key,
  personid integer NOT NULL references users.userid,
  username varchar(16) NOT NULL,
  password varchar(32) NOT NULL,
  salt varchar(32) NOT NULL,
  email varchar(64) NOT NULL,
  verified boolean default false,
  verificationcode varchar(8) NOT NULL,
  points integer default 0,
  address integer references cities.cityid,
  insertedon timestamp default now()
);

CREATE TABLE subscriptions AS (
  subscriptionid integer primary key,
  subscriber integer NOT NULL references users.userid,
  to integer NOT NULL references users.userid,
  insertedon timestamp default now()
);

CREATE TABLE categories AS (
  categoryid integer primary key,
  categoryname varchar(32)
);

CREATE TABLE regions AS (
  regionid integer primary key,
  regionname varchar(16) NOT NULL
);

CREATE TABLE cities AS (
  cityid integer primary key,
  cityname varchar(32),
  regionid integer references regions.regionid
);

CREATE TABLE ads AS (
  adid integer primary key,
  owner integer NOT NULL references users.userid,
  isfeatured boolean default false,
  duration interval NOT NULL,
  imagelink text,
  body text,
  categorid integer NOT NULL references categories.categoryid,
  cityid integer NOT NULL references cities.cityid,
  insertedon timestamp default now()
);

CREATE TABLE wishes AS (
  wishid integer primary key,
  userid integer NOT NULL references users.userid,
  adid integer NOT NULL references ads.adid
);
