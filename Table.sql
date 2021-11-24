DROP TABLE IF EXISTS ORDERSTATUS;
DROP TABLE IF EXISTS CHECKINGOUT;
DROP TABLE IF EXISTS CART;
DROP TABLE IF EXISTS STORE;
DROP TABLE IF EXISTS BILLINGINFO;
DROP TABLE IF EXISTS PAYMENT;
DROP TABLE IF EXISTS ITEM;
DROP TABLE IF EXISTS HUMAN;

CREATE TABLE IF NOT EXISTS HUMAN
(
    ID      INT(8)          NOT NULL,
    FNAME   CHAR(30)        NOT NULL,
    MNAME   CHAR(30)                ,
    LNAME   CHAR(30)        NOT NULL,
    PHONE   BIGINT(10)      NOT NULL,
    EMAIL   CHAR(50)                ,

    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS ITEM
(
    IID         INT(8)          NOT NULL,
    INAME       CHAR(50)        NOT NULL,
    PRICE       DECIMAL(6,2)    DEFAULT '0.00',
    IEDITION    CHAR(30)       DEFAULT 'STANDARD',
    ICONDITION  CHAR(30)        ,
    #TAX        DECIMAL(3,2)    DEFAULT '0.00', 
    IDETAIL     TEXT                    ,
    #FRESHIP    BOOLEAN         DEFAULT '0',
    #PROMO      BOOLEAN         DEFAULT '0',
    #SALE       BOOLEAN         DEFAULT '0',
    #DISCOUN    DECIMAL(3,2)    DEFAULT '0.00',
    #TPRICE     DECIMAL(6,2)    DEFAULT '0.00',
    #REWARD     DECIMAL(3,2)    DEFAULT '0.00',

    PRIMARY KEY (IID)
);

CREATE TABLE IF NOT EXISTS STORE
(
    EMPID   INT(8)          NOT NULL,
    IID     INT(8)          NOT NULL,
    QTY     INT(8)          DEFAULT '0',

    PRIMARY KEY (EMPID,IID),
    FOREIGN KEY (EMPID)     REFERENCES HUMAN(ID),
    FOREIGN KEY (IID)       REFERENCES ITEM(IID)
);

CREATE TABLE IF NOT EXISTS PAYMENT
(
    UID     INT(8)          NOT NULL,
    CARDNUM CHAR(16)         NOT NULL,
    EXPMON  CHAR(2)          NOT NULL,
    EXPYEAR CHAR(4)          NOT NULL,
    CVN     CHAR(3)          NOT NULL,
    CFNAME  CHAR(30)        NOT NULL,
    CLNAME  CHAR(30)        NOT NULL,

    PRIMARY KEY (UID),
    FOREIGN KEY (UID)       REFERENCES HUMAN(ID)
);

CREATE TABLE IF NOT EXISTS BILLINGINFO
(
    UID     INT(8)          NOT NULL,
    ADDRESS TEXT              ,
    OPTLINE TEXT              ,
    CITY    CHAR(50)        NOT NULL,
    STATE   CHAR(10)        NOT NULL,
    ZIPCODE INT(5)          NOT NULL,
    COUNTRY CHAR(50)        DEFAULT'USA',
    CONTACT CHAR(10)        DEFAULT'PHONE-CALL',

    PRIMARY KEY (UID),
    FOREIGN KEY (UID)       REFERENCES HUMAN(ID)
);

CREATE TABLE IF NOT EXISTS CART
(
    CID     INT(8)          NOT NULL,
    UID     INT(8)          NOT NULL,
    IID     INT(8)          NOT NULL,
    SELEQTY INT(8)          DEFAULT '1',

    PRIMARY KEY (CID,UID,IID),
    FOREIGN KEY (UID)       REFERENCES HUMAN(ID),
    FOREIGN KEY (IID)       REFERENCES ITEM(IID)
);

CREATE TABLE IF NOT EXISTS CHECKINGOUT
(
    OID     BIGINT(8)          NOT NULL,
    CID     INT(8)          NOT NULL,
    TOTAL   DECIMAL(6,2)    DEFAULT '0.00',

    PRIMARY KEY (OID,CID),
    FOREIGN KEY (CID)       REFERENCES CART(CID)
);

CREATE TABLE IF NOT EXISTS ORDERSTATUS
(
    OID     INT(8)          NOT NULL,
    CID     INT(8)          NOT NULL,
    UID     INT(8)          NOT NULL,
    IID     INT(8)          NOT NULL,
    EMPID   INT(8)          NOT NULL,
    STATUS  CHAR(10)        DEFAULT 'Pending',
    TRACID  INT(8)                  ,    
    NOTE    TEXT         ,

    PRIMARY KEY(OID,CID,UID,IID,EMPID),
     
    FOREIGN KEY (UID)       REFERENCES HUMAN(ID),
    FOREIGN KEY (IID)       REFERENCES ITEM(IID),
    FOREIGN KEY (EMPID)     REFERENCES HUMAN(ID),
    FOREIGN KEY (CID)       REFERENCES CART(CID)
);