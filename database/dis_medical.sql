/*
Navicat MySQL Data Transfer

Source Server         : Clinic
Source Server Version : 50531
Source Host           : localhost:3306
Source Database       : dis_medical

Target Server Type    : MYSQL
Target Server Version : 50531
File Encoding         : 65001

Date: 2020-09-03 07:40:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clinic_address
-- ----------------------------
DROP TABLE IF EXISTS `clinic_address`;
CREATE TABLE `clinic_address` (
  `ADDRESS_ID` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `ADDRESS_BANNO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ADDRESS_MOO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ADDRESS_BAN` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ADDRESS_TUMBON` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ADDRESS_AMPHER` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ADDRESS_PROVINCE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ADDRESS_POSECODE` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PER_ID` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ADDRESS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of clinic_address
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_category
-- ----------------------------
DROP TABLE IF EXISTS `clinic_category`;
CREATE TABLE `clinic_category` (
  `CAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CAT_NAME` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CAT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_category
-- ----------------------------
INSERT INTO `clinic_category` VALUES ('1', 'GASTRO-INTESTINAL SYSTEM ( ระบบทางเดินอาหาร )', '2020-06-15 03:30:28', '2020-06-15 03:30:28');
INSERT INTO `clinic_category` VALUES ('2', 'CARDIOVASCULAR SYSTEM ( ระบบหัวใจและหลอดเลือด )', '2020-06-15 03:30:32', '2020-06-15 03:30:32');
INSERT INTO `clinic_category` VALUES ('3', 'RESPIRATORY SYSTEM ( ระบบทางเดินหายใจ )', '2020-06-15 03:30:38', '2020-06-15 03:30:38');
INSERT INTO `clinic_category` VALUES ('4', 'CENTRAL NERVOUS SYSTEM ( ระบบประสาทส่วนกลาง )', '2020-06-15 03:30:46', '2020-06-15 03:30:46');
INSERT INTO `clinic_category` VALUES ('5', 'INFECTIONS ( การติดเชื้อ )', '2020-06-19 14:01:13', '2020-06-19 14:01:13');
INSERT INTO `clinic_category` VALUES ('6', 'ENDOCRINE SYSTEM ( ระบบ ENDOCRINE )', '2020-06-21 03:52:27', '2020-06-21 03:52:27');
INSERT INTO `clinic_category` VALUES ('7', 'OBSTERICS,GYNAECOLOGY,AND URINARY-TRACT DISODERS(ระบบไหลเวียนโลหิต)', '2020-07-05 16:20:34', null);
INSERT INTO `clinic_category` VALUES ('8', 'NUTRITION AND BLOOD ( โภชนาการและเลือด )', '2020-07-05 16:20:38', null);
INSERT INTO `clinic_category` VALUES ('9', 'MUSCULOSKELETAL AND JOINT DISEASES ( โรคกล้ามเนื้อและข้อต่อ )', '2020-07-05 16:20:41', null);
INSERT INTO `clinic_category` VALUES ('10', 'EYE ( ตา )', '2020-07-05 16:20:44', null);
INSERT INTO `clinic_category` VALUES ('11', 'EAR,NOSE,OROPHARNX AND ORAL CAVITY ( หูจมูกรูขุมขนและช่องปาก )', '2020-07-05 16:20:47', null);
INSERT INTO `clinic_category` VALUES ('12', 'SKIN ( ผิวหนัง )', '2020-07-05 16:20:50', null);
INSERT INTO `clinic_category` VALUES ('13', 'ANESTHESIA ( วิสัญญี )', '2020-07-05 16:20:55', null);
INSERT INTO `clinic_category` VALUES ('14', 'OTHER ( อื่นฯ )', '2020-07-05 16:20:58', null);
INSERT INTO `clinic_category` VALUES ('15', 'สมุนไพร', '2020-07-05 16:21:01', null);
INSERT INTO `clinic_category` VALUES ('16', 'รายการวัสดุเภสัชกรรม', '2020-07-05 16:21:03', null);

-- ----------------------------
-- Table structure for clinic_check
-- ----------------------------
DROP TABLE IF EXISTS `clinic_check`;
CREATE TABLE `clinic_check` (
  `CHECK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SYM_ID` varchar(11) DEFAULT NULL,
  `CHECK_HIGHT` varchar(255) DEFAULT NULL,
  `CHECK_WEIGHT` double(10,2) DEFAULT NULL,
  `CHECK_HT` varchar(100) DEFAULT NULL,
  `CHECK_BP` varchar(100) DEFAULT NULL,
  `CHECK_TEMP` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CHECK_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_check
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_drug
-- ----------------------------
DROP TABLE IF EXISTS `clinic_drug`;
CREATE TABLE `clinic_drug` (
  `DRUG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DRUG_CODE` varchar(255) DEFAULT NULL,
  `DRUG_NAME` varchar(255) DEFAULT NULL,
  `DRUG_STRENGTH` varchar(255) DEFAULT NULL,
  `DRUG_UNIT` varchar(255) DEFAULT NULL,
  `DRUG_UNIT_PRICE` decimal(8,3) DEFAULT NULL,
  `DRUG_STORE` varchar(100) DEFAULT NULL,
  `DRUG_DID` varchar(255) DEFAULT NULL,
  `THERAPEUTIC` longtext,
  `CAT_ID` varchar(11) DEFAULT NULL,
  `DRUG_UNIT_PRICE_COST` decimal(8,3) DEFAULT NULL,
  `DRUG_IMG` blob,
  `STATUS` varchar(100) DEFAULT NULL,
  `DRUG_RECIEVE_QTY` varchar(255) DEFAULT NULL,
  `DRUG_RECIEVE_QTY_UPDATE` varchar(255) DEFAULT NULL,
  `DRUG_RECIEVE` varchar(255) DEFAULT NULL,
  `DRUG_PAY` varchar(255) DEFAULT NULL,
  `DRUG_PAY_QTY_UPDATE` varchar(255) DEFAULT NULL,
  `DRUG_SYM_PAY` varchar(255) DEFAULT NULL,
  `DRUG_TOTAL` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`DRUG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_drug
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_hmain
-- ----------------------------
DROP TABLE IF EXISTS `clinic_hmain`;
CREATE TABLE `clinic_hmain` (
  `HMAIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HMAIN_CODE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HMAIN_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`HMAIN_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of clinic_hmain
-- ----------------------------
INSERT INTO `clinic_hmain` VALUES ('1', '45', 'รพ.ร้อยเอ็ด', '2020-07-08 22:40:58', null);

-- ----------------------------
-- Table structure for clinic_locate
-- ----------------------------
DROP TABLE IF EXISTS `clinic_locate`;
CREATE TABLE `clinic_locate` (
  `LOCATE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOCATE_NAME` varchar(255) DEFAULT NULL,
  `LOCATE_CODE` varchar(100) DEFAULT NULL,
  `LOCATE_TUMBON` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`LOCATE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_locate
-- ----------------------------
INSERT INTO `clinic_locate` VALUES ('1', 'โรงพยาบาลส่งเสริมสุขภาพตำบลบ้านวังม่วยเหนือ', '05178', 'วังสามัคคี', '2020-08-30 08:24:53', null);

-- ----------------------------
-- Table structure for clinic_orders
-- ----------------------------
DROP TABLE IF EXISTS `clinic_orders`;
CREATE TABLE `clinic_orders` (
  `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ORDER_BILLNO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_BILLPO` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_DATE` date DEFAULT NULL,
  `ORDER_YEAR` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_SUP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_STAFF` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_APPROVER` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_STORE` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_TOTAL` decimal(10,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ORDER_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of clinic_orders
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_orders_detail
-- ----------------------------
DROP TABLE IF EXISTS `clinic_orders_detail`;
CREATE TABLE `clinic_orders_detail` (
  `ORDER_DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ORDER_ID` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_DETAIL_DRUG_ID` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_DETAIL_DRUG_CODE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_DETAIL_DRUG_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_DETAIL_DRUG_UNIT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_DETAIL_DRUG_QTY` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORDER_DETAIL_DRUG_PRICE` decimal(8,2) DEFAULT NULL,
  `ORDER_DETAIL_DRUG_TOTAL` decimal(8,2) DEFAULT NULL,
  `ORDER_DETAIL_STORE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ORDER_DETAIL_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of clinic_orders_detail
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_pay
-- ----------------------------
DROP TABLE IF EXISTS `clinic_pay`;
CREATE TABLE `clinic_pay` (
  `PAY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAY_BILLNO` varchar(255) DEFAULT NULL,
  `PAY_DATE` date DEFAULT NULL,
  `PAY_BILL_ORDERS` varchar(255) DEFAULT NULL,
  `PAY_STAFF` varchar(255) DEFAULT NULL,
  `PAY_USER` varchar(255) DEFAULT NULL,
  `PAY_APPROVER` varchar(255) DEFAULT NULL,
  `PAY_STORE` varchar(100) DEFAULT NULL,
  `PAY_STORE_STAFF` varchar(100) DEFAULT NULL,
  `PAY_TOTAL` decimal(10,3) DEFAULT NULL,
  `PAY_YEAR` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PAY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_pay
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_pay_store
-- ----------------------------
DROP TABLE IF EXISTS `clinic_pay_store`;
CREATE TABLE `clinic_pay_store` (
  `PAYDETAIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAYDETAIL_PAY_ID` varchar(255) DEFAULT NULL,
  `PAYDETAIL_DRUG_ID` varchar(100) DEFAULT NULL,
  `PAYDETAIL_DRUG_CODE` varchar(255) DEFAULT NULL,
  `PAYDETAIL_DRUG_NAME` varchar(255) DEFAULT NULL,
  `PAYDETAIL_DRUG_QTY` varchar(110) DEFAULT NULL,
  `PAYDETAIL_DRUG_UNIT` varchar(255) DEFAULT NULL,
  `PAYDETAIL_DRUG_PRICE` decimal(8,2) DEFAULT NULL,
  `STORE_RECIEVE_DRUG_LOT` varchar(100) DEFAULT NULL,
  `PAYDETAIL_DRUG_PRICE_TOTAL` decimal(8,2) DEFAULT NULL,
  `STORE_LOCATE_ID` int(11) DEFAULT NULL,
  `STORE_RECIEVE_DRUG_DATE_BEGIN` date DEFAULT NULL,
  `STORE_RECIEVE_DRUG_DATE_EXP` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PAYDETAIL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_pay_store
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_per
-- ----------------------------
DROP TABLE IF EXISTS `clinic_per`;
CREATE TABLE `clinic_per` (
  `PER_ID` int(20) NOT NULL AUTO_INCREMENT,
  `PER_CID` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PER_PNAME` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PER_FNAME` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PER_LNAME` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PER_TEL` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PER_AGE` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PER_IMG` blob,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `SIT_ID` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STATUS` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PER_QU` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of clinic_per
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_per_status
-- ----------------------------
DROP TABLE IF EXISTS `clinic_per_status`;
CREATE TABLE `clinic_per_status` (
  `STATUS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STATUS_NAME_EN` varchar(255) DEFAULT NULL,
  `STATUS_NAME_TH` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`STATUS_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_per_status
-- ----------------------------
INSERT INTO `clinic_per_status` VALUES ('1', 'PAID', 'ชำระแล้ว', '2020-06-02 22:33:30', null);
INSERT INTO `clinic_per_status` VALUES ('2', 'UNPAID', 'ยังไม่ชำระ', '2020-06-02 22:33:34', null);
INSERT INTO `clinic_per_status` VALUES ('3', 'OVERDUE', 'ค้างชำระ', '2020-06-02 22:34:39', null);

-- ----------------------------
-- Table structure for clinic_position
-- ----------------------------
DROP TABLE IF EXISTS `clinic_position`;
CREATE TABLE `clinic_position` (
  `POSITION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `POSITION_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`POSITION_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of clinic_position
-- ----------------------------
INSERT INTO `clinic_position` VALUES ('1', 'สาธารณสุขอำเภอ', '2020-07-02 22:36:59', null);
INSERT INTO `clinic_position` VALUES ('2', 'ผู้ช่วยสาธารณสุข', '2020-07-02 22:37:16', null);
INSERT INTO `clinic_position` VALUES ('3', 'ผู้อำนวยการโรงพยาบาลส่งเสริมสุขภาพตำบล', '2020-07-02 22:37:50', null);
INSERT INTO `clinic_position` VALUES ('4', 'รองผู้อำนวยการ', '2020-07-02 22:38:45', null);
INSERT INTO `clinic_position` VALUES ('5', 'พยาบาลวิชาชีพชำนาญการ', '2020-07-02 22:39:15', null);
INSERT INTO `clinic_position` VALUES ('6', 'นักวิชาการสาธารณสุขปฏิบัติการ', '2020-07-02 22:39:31', null);
INSERT INTO `clinic_position` VALUES ('7', 'ทันตภิบาล', '2020-07-02 22:39:56', null);
INSERT INTO `clinic_position` VALUES ('8', 'เจ้าหน้าที่บันทึกข้อมูล', '2020-07-02 22:40:19', null);
INSERT INTO `clinic_position` VALUES ('9', 'ลูกจ้างทั่วไป', '2020-07-02 22:40:31', null);
INSERT INTO `clinic_position` VALUES ('10', 'ทันตกรรม', '2020-07-10 11:38:02', null);
INSERT INTO `clinic_position` VALUES ('11', 'ผู้ช่วยทันตกรรม', '2020-07-13 19:05:50', null);

-- ----------------------------
-- Table structure for clinic_pre
-- ----------------------------
DROP TABLE IF EXISTS `clinic_pre`;
CREATE TABLE `clinic_pre` (
  `PRE_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PRE_NAME` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`PRE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of clinic_pre
-- ----------------------------
INSERT INTO `clinic_pre` VALUES ('1', 'เด็กชาย', '2020-05-28 22:30:42', null);
INSERT INTO `clinic_pre` VALUES ('2', 'เด็กหญิง', '2020-05-28 22:30:56', null);
INSERT INTO `clinic_pre` VALUES ('3', 'นาย', '2020-05-28 22:31:14', null);
INSERT INTO `clinic_pre` VALUES ('4', 'นางสาว', '2020-05-28 22:31:31', null);

-- ----------------------------
-- Table structure for clinic_recieve
-- ----------------------------
DROP TABLE IF EXISTS `clinic_recieve`;
CREATE TABLE `clinic_recieve` (
  `REC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `REC_BILLNO` varchar(255) DEFAULT NULL,
  `REC_BILLPO` varchar(100) DEFAULT NULL,
  `REC_DATE` date DEFAULT NULL,
  `REC_YEAR` varchar(100) DEFAULT NULL,
  `REC_SUP` varchar(255) DEFAULT NULL,
  `REC_STAFF` varchar(255) DEFAULT NULL,
  `REC_LOCATE` varchar(100) DEFAULT NULL,
  `REC_TOTAL` decimal(10,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`REC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_recieve
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_recieve_store
-- ----------------------------
DROP TABLE IF EXISTS `clinic_recieve_store`;
CREATE TABLE `clinic_recieve_store` (
  `STORE_RECIEVE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `REC_ID` varchar(100) DEFAULT NULL,
  `STORE_RECIEVE_DRUG_ID` varchar(100) DEFAULT NULL,
  `STORE_RECIEVE_DRUG_CODE` varchar(255) DEFAULT NULL,
  `STORE_RECIEVE_DRUG_NAME` varchar(255) DEFAULT NULL,
  `STORE_RECIEVE_DRUG_UNIT` varchar(255) DEFAULT NULL,
  `STORE_RECIEVE_DRUG_QTY` varchar(255) DEFAULT NULL,
  `STORE_RECIEVE_DRUG_PRICE` decimal(10,3) DEFAULT NULL,
  `STORE_RECIEVE_DRUG_TOTAL` decimal(10,3) DEFAULT NULL,
  `STORE_RECIEVE_DRUG_LOT` varchar(10) DEFAULT NULL,
  `STORE_LOCATE_ID` int(10) DEFAULT NULL,
  `STORE_RECIEVE_DRUG_DATE_BEGIN` date DEFAULT NULL,
  `STORE_RECIEVE_DRUG_DATE_EXP` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`STORE_RECIEVE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_recieve_store
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_sit
-- ----------------------------
DROP TABLE IF EXISTS `clinic_sit`;
CREATE TABLE `clinic_sit` (
  `SIT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SIT_NAME` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SIT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_sit
-- ----------------------------
INSERT INTO `clinic_sit` VALUES ('1', 'ประกันสังคม', '2020-05-29 21:06:55', '2020-05-29 21:06:52');
INSERT INTO `clinic_sit` VALUES ('2', 'บัตรทอง(30บาท)', '2020-05-29 21:07:32', '2020-05-29 21:07:28');
INSERT INTO `clinic_sit` VALUES ('3', 'จ่ายเอง', '2020-05-29 21:07:59', '2020-05-29 21:07:55');

-- ----------------------------
-- Table structure for clinic_stock
-- ----------------------------
DROP TABLE IF EXISTS `clinic_stock`;
CREATE TABLE `clinic_stock` (
  `STOCK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STOCK_DRUG_ID` varchar(100) DEFAULT NULL,
  `STOCK_DRUG_NAME` varchar(255) DEFAULT NULL,
  `STOCK_QTY` varchar(255) DEFAULT NULL,
  `STOCK_RECIEVE` varchar(255) DEFAULT NULL,
  `STOCK_PAY` varchar(255) DEFAULT NULL,
  `STOCK_TOTALL` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`STOCK_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_stock
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_supplier
-- ----------------------------
DROP TABLE IF EXISTS `clinic_supplier`;
CREATE TABLE `clinic_supplier` (
  `SUP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SUP_NAME` varchar(255) DEFAULT NULL,
  `SUP_TEL` varchar(255) DEFAULT NULL,
  `SUP_ADDRESS` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SUP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_supplier
-- ----------------------------
INSERT INTO `clinic_supplier` VALUES ('1', 'ร้านยาเภสัช สยามไทยจำกัด  055', '095-263-23650000', '2222', '2020-08-30 09:15:57', '2020-08-30 09:15:57');

-- ----------------------------
-- Table structure for clinic_sym
-- ----------------------------
DROP TABLE IF EXISTS `clinic_sym`;
CREATE TABLE `clinic_sym` (
  `SYM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PER_ID` varchar(11) DEFAULT NULL,
  `SYM_DATE` date DEFAULT NULL,
  `SYM_TIME` time DEFAULT NULL,
  `SYM_DRUG_ALLERGY` varchar(255) DEFAULT NULL,
  `SYM_ROKE` varchar(255) DEFAULT NULL,
  `SYM_AKAN` varchar(500) DEFAULT NULL,
  `SYM_DIAG` varchar(255) DEFAULT NULL,
  `SYM_SUMTOTALPRICE` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SYM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_sym
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_sym_detail
-- ----------------------------
DROP TABLE IF EXISTS `clinic_sym_detail`;
CREATE TABLE `clinic_sym_detail` (
  `SYM_DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SYM_ID` varchar(100) DEFAULT NULL,
  `SYM_DETAIL_DRUGID` varchar(100) DEFAULT NULL,
  `SYM_DETAIL_DRUGNAME` varchar(255) DEFAULT NULL,
  `SYM_DETAIL_DRUGQTY` varchar(255) DEFAULT NULL,
  `SYM_DETAIL_DRUGUNIT` varchar(255) DEFAULT NULL,
  `SYM_DETAIL_DRUGPRICE` decimal(8,2) DEFAULT NULL,
  `SYM_DETAIL_TOTALPRICE` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`SYM_DETAIL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_sym_detail
-- ----------------------------

-- ----------------------------
-- Table structure for clinic_unit
-- ----------------------------
DROP TABLE IF EXISTS `clinic_unit`;
CREATE TABLE `clinic_unit` (
  `UNIT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UNIT_NAME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`UNIT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of clinic_unit
-- ----------------------------
INSERT INTO `clinic_unit` VALUES ('1', 'TABLET', null, null);
INSERT INTO `clinic_unit` VALUES ('2', 'เม็ด', null, null);
INSERT INTO `clinic_unit` VALUES ('3', 'CAPSULE', null, null);
INSERT INTO `clinic_unit` VALUES ('4', 'TAB', null, null);
INSERT INTO `clinic_unit` VALUES ('5', 'ขวด (10 ML.)', null, null);
INSERT INTO `clinic_unit` VALUES ('6', 'ขวด (60 ML.)', null, null);
INSERT INTO `clinic_unit` VALUES ('7', 'ขวด (120 ML.)', null, null);
INSERT INTO `clinic_unit` VALUES ('8', 'ขวด (180 ML.)', null, null);
INSERT INTO `clinic_unit` VALUES ('9', 'ขวด (240 ML.)', null, null);
INSERT INTO `clinic_unit` VALUES ('10', 'ขวด (450 ML.)', null, null);
INSERT INTO `clinic_unit` VALUES ('11', 'AMP (1 ml.)', null, null);
INSERT INTO `clinic_unit` VALUES ('12', 'AMP (2 ml.)', null, null);
INSERT INTO `clinic_unit` VALUES ('13', 'AMP (3 ml.)', null, null);
INSERT INTO `clinic_unit` VALUES ('14', 'หลอด (5 G.)', null, null);
INSERT INTO `clinic_unit` VALUES ('15', 'หลอด (10 G.)', null, null);
INSERT INTO `clinic_unit` VALUES ('16', 'หลอด (15 G.)', null, null);
INSERT INTO `clinic_unit` VALUES ('17', 'หลอด (20 G.)', null, null);
INSERT INTO `clinic_unit` VALUES ('18', 'หลอด (30 G.)', null, null);
INSERT INTO `clinic_unit` VALUES ('19', 'หลอด (35 G.)', null, null);
INSERT INTO `clinic_unit` VALUES ('20', 'หลอด (45 G.)', null, null);
INSERT INTO `clinic_unit` VALUES ('21', 'x 1 ซอง', null, null);
INSERT INTO `clinic_unit` VALUES ('22', 'x 5 ซอง', null, null);
INSERT INTO `clinic_unit` VALUES ('23', 'x 10 ซอง', null, null);
INSERT INTO `clinic_unit` VALUES ('24', 'x 20 ซอง', null, null);
INSERT INTO `clinic_unit` VALUES ('25', 'x50 ซอง', null, null);
INSERT INTO `clinic_unit` VALUES ('26', 'x 100 ซอง', null, null);
INSERT INTO `clinic_unit` VALUES ('27', 'x 500 ซอง', null, null);
INSERT INTO `clinic_unit` VALUES ('28', 'x 1 AMP', null, null);
INSERT INTO `clinic_unit` VALUES ('29', 'x 2 AMP', null, null);
INSERT INTO `clinic_unit` VALUES ('30', 'x 5 AMP', null, null);
INSERT INTO `clinic_unit` VALUES ('31', 'x 10 AMP', null, null);
INSERT INTO `clinic_unit` VALUES ('32', 'x 1 BOTT', null, null);
INSERT INTO `clinic_unit` VALUES ('33', 'x 12 BOTT', null, null);
INSERT INTO `clinic_unit` VALUES ('34', 'x 20 BOTT', null, null);
INSERT INTO `clinic_unit` VALUES ('35', 'x 50 BOTT', null, null);
INSERT INTO `clinic_unit` VALUES ('36', 'x 70 BOTT', null, null);
INSERT INTO `clinic_unit` VALUES ('37', 'x 1 TAB', null, null);
INSERT INTO `clinic_unit` VALUES ('38', 'x 30 TAB', null, null);
INSERT INTO `clinic_unit` VALUES ('39', 'x 100 TAB', null, null);
INSERT INTO `clinic_unit` VALUES ('40', 'x 250 TAB', null, null);
INSERT INTO `clinic_unit` VALUES ('41', 'x 500 TAB', null, null);
INSERT INTO `clinic_unit` VALUES ('42', 'x 1000 TAB', null, null);
INSERT INTO `clinic_unit` VALUES ('43', 'x 10 VIAL', null, null);
INSERT INTO `clinic_unit` VALUES ('44', 'x ม้วน', null, null);
INSERT INTO `clinic_unit` VALUES ('45', 'BAG(100 ML.)', null, null);
INSERT INTO `clinic_unit` VALUES ('46', 'BAG(500 ML.)', null, null);
INSERT INTO `clinic_unit` VALUES ('47', 'BAG(1000 ML.)', null, null);
INSERT INTO `clinic_unit` VALUES ('48', 'ชิ้น', null, null);
INSERT INTO `clinic_unit` VALUES ('49', 'ถาด', null, null);
INSERT INTO `clinic_unit` VALUES ('56', 'ลัง', '2020-08-19 14:27:17', '2020-08-19 14:27:17');

-- ----------------------------
-- Table structure for clinic_year
-- ----------------------------
DROP TABLE IF EXISTS `clinic_year`;
CREATE TABLE `clinic_year` (
  `YEAR_ID` int(11) NOT NULL,
  `YEAR_NAME` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`YEAR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clinic_year
-- ----------------------------
INSERT INTO `clinic_year` VALUES ('1', '2017', null, null);
INSERT INTO `clinic_year` VALUES ('2', '2018', null, null);
INSERT INTO `clinic_year` VALUES ('3', '2019', null, null);
INSERT INTO `clinic_year` VALUES ('4', '2020', null, null);
INSERT INTO `clinic_year` VALUES ('5', '2021', null, null);
INSERT INTO `clinic_year` VALUES ('6', '2022', null, null);
INSERT INTO `clinic_year` VALUES ('7', '2023', null, null);

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `CON_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CON_NAME` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CON_EMAIL` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CON_TEL` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CON_SUBJECT` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CON_MESSAGE` varchar(222) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CON_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of contact
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for hdc_nhso
-- ----------------------------
DROP TABLE IF EXISTS `hdc_nhso`;
CREATE TABLE `hdc_nhso` (
  `Person_ID` varchar(13) NOT NULL,
  `Title` varchar(20) DEFAULT NULL,
  `Fname` varchar(40) DEFAULT NULL,
  `Lname` varchar(40) DEFAULT NULL,
  `Sex` varchar(1) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Nation` varchar(3) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `StatusName` varchar(200) DEFAULT NULL,
  `Purchase` varchar(60) DEFAULT NULL,
  `Chat` varchar(8) DEFAULT NULL,
  `Province_Name` varchar(60) DEFAULT NULL,
  `Amphur_name` varchar(60) DEFAULT NULL,
  `Tumbon_name` varchar(60) DEFAULT NULL,
  `Moo` varchar(3) DEFAULT NULL,
  `MooBan_Name` varchar(60) DEFAULT NULL,
  `Pttype` varchar(2) DEFAULT NULL,
  `MasterCupID` varchar(11) DEFAULT NULL,
  `MainInscl` varchar(20) DEFAULT NULL,
  `MainInscl_Name` varchar(200) DEFAULT NULL,
  `SubInscl` varchar(20) DEFAULT NULL,
  `SubInscl_Name` varchar(200) DEFAULT NULL,
  `Card_ID` varchar(20) DEFAULT NULL,
  `HMain` varchar(5) DEFAULT NULL,
  `HMain_Name` varchar(200) DEFAULT NULL,
  `HMainOP` varchar(5) DEFAULT NULL,
  `HSub` varchar(5) DEFAULT NULL,
  `HSub_Name` varchar(200) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `ExpDate` date DEFAULT NULL,
  `Remark` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Person_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

-- ----------------------------
-- Records of hdc_nhso
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('10', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('11', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('12', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('13', '2020_05_28_131251_create_clinic_per_table', '1');
INSERT INTO `migrations` VALUES ('14', '2020_05_28_132456_create_clinic_pre_table', '1');
INSERT INTO `migrations` VALUES ('15', '2020_05_28_132636_create_clinic_address_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permiss
-- ----------------------------
DROP TABLE IF EXISTS `permiss`;
CREATE TABLE `permiss` (
  `PERMISS_ID` int(11) NOT NULL,
  `PERMISS_CODE` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PERMISS_TEXT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PERMISS_TEXT_EN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PERMISS_STATUS` enum('on','of') COLLATE utf8_unicode_ci DEFAULT 'of',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`PERMISS_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permiss
-- ----------------------------
INSERT INTO `permiss` VALUES ('1', 'PM1001', 'HOS_MISS', 'HOS', 'on', '2020-08-10 09:08:17', '2020-08-12 04:57:46');
INSERT INTO `permiss` VALUES ('2', 'PM1002', 'MEDICAL_MISS', 'MEDICAL', 'on', '2020-08-10 09:08:54', '2020-08-13 00:00:32');
INSERT INTO `permiss` VALUES ('3', 'PM1003', 'DELETE_MISS', 'DELETE', 'on', '2020-08-10 09:09:20', '2020-08-12 05:42:39');
INSERT INTO `permiss` VALUES ('4', 'PM1004', 'EDIT_MISS', 'EDIT', 'on', '2020-08-14 15:34:29', null);
INSERT INTO `permiss` VALUES ('5', 'PM1005', 'SUPPLIER_MISS', 'SUPPLIER', 'of', '2020-08-14 16:12:34', null);
INSERT INTO `permiss` VALUES ('6', 'PM1006', 'STORE_MISS', 'STORE', 'of', '2020-08-15 14:50:55', null);
INSERT INTO `permiss` VALUES ('0', 'MED1001', 'UNIT_MISS', 'UNIT', 'of', '2020-08-15 14:51:00', null);
INSERT INTO `permiss` VALUES ('8', 'MED1002', 'CATEGORY_MISS', 'CATEGORY', 'of', '2020-08-15 14:51:04', null);
INSERT INTO `permiss` VALUES ('9', 'MED1003', 'DRUG_MISS', 'DRUG', 'of', '2020-08-15 14:51:08', null);
INSERT INTO `permiss` VALUES ('10', 'MED1004', 'ORDER_MISS', 'ORDER', 'of', '2020-08-15 14:51:12', null);
INSERT INTO `permiss` VALUES ('11', 'MED1005', 'RECIEVE_MISS', 'RECIEVE', 'of', '2020-08-15 14:51:15', null);
INSERT INTO `permiss` VALUES ('12', 'MED1006', 'PAY_MISS', 'PAY', 'of', '2020-08-15 14:51:19', null);
INSERT INTO `permiss` VALUES ('13', 'MED1007', 'STICKER_MISS', 'STICKER', 'of', '2020-08-15 14:51:21', null);
INSERT INTO `permiss` VALUES ('14', 'MED1008', 'STAFF_MISS', 'STAFF', 'on', '2020-08-14 16:26:59', null);
INSERT INTO `permiss` VALUES ('15', 'REP1001', 'REPORT_MISS', 'REPORT', 'of', '2020-08-15 14:51:25', null);

-- ----------------------------
-- Table structure for permiss_list
-- ----------------------------
DROP TABLE IF EXISTS `permiss_list`;
CREATE TABLE `permiss_list` (
  `PERMISS_LIST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PERMISS_LIST_USER` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `PERMISS_LIST_HO` enum('off','on') COLLATE utf8_unicode_ci DEFAULT 'off',
  `PERMISS_LIST_ME` enum('off','on') COLLATE utf8_unicode_ci DEFAULT 'off',
  `PERMISS_LIST_DELETE` enum('off','on') COLLATE utf8_unicode_ci DEFAULT 'off',
  `PERMISS_LIST_EDIT` enum('off','on') COLLATE utf8_unicode_ci DEFAULT 'off',
  `PERMISS_LIST_ADD` enum('off','on') COLLATE utf8_unicode_ci DEFAULT 'off',
  `PERMISS_LIST_CLAIM` enum('off','on') COLLATE utf8_unicode_ci DEFAULT 'off',
  `PERMISS_LIST_REPORT` enum('off','on') COLLATE utf8_unicode_ci DEFAULT 'off',
  PRIMARY KEY (`PERMISS_LIST_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permiss_list
-- ----------------------------

-- ----------------------------
-- Table structure for posproducts
-- ----------------------------
DROP TABLE IF EXISTS `posproducts`;
CREATE TABLE `posproducts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `strength` text COLLATE utf8_unicode_ci,
  `barcode` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `img` blob,
  `price` double(10,2) NOT NULL,
  `pricecost` double(10,2) NOT NULL,
  `did` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posproducts_barcode_unique` (`barcode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of posproducts
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cid` varchar(130) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `QRpassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` blob,
  `status` enum('SUPER_ADMIN','ADMIN','SUPER_STAFF','STAFF','USER') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `store_id` int(11) DEFAULT NULL,
  `perm` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linetoken` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_add` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_edit` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_delete` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_medic` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_hos` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_claim` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_rep` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1234567893042', 'ผู้ดูแลระบบ', null, 'dis@gmail.com', '8', null, '$2y$10$LrZ0XJoKi7ddUARqzWM0S.epAVmdM/WMyV78KkqfFV2g9xmOEKloW', null, 'iR5WgxXg5hdggb1Zi6UCGhWrHmXw1tg0JKhD0FO2gpyjbBP84A0XWc723mK7', null, 0xFFD8FFE000104A46494600010101007800780000FFE100224578696600004D4D002A00000008000101120003000000010001000000000000FFDB0043000201010201010202020202020202030503030303030604040305070607070706070708090B0908080A0807070A0D0A0A0B0C0C0C0C07090E0F0D0C0E0B0C0C0CFFDB004301020202030303060303060C0807080C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0C0CFFC0001108015E00F503012200021101031101FFC4001F0000010501010101010100000000000000000102030405060708090A0BFFC400B5100002010303020403050504040000017D01020300041105122131410613516107227114328191A1082342B1C11552D1F02433627282090A161718191A25262728292A3435363738393A434445464748494A535455565758595A636465666768696A737475767778797A838485868788898A92939495969798999AA2A3A4A5A6A7A8A9AAB2B3B4B5B6B7B8B9BAC2C3C4C5C6C7C8C9CAD2D3D4D5D6D7D8D9DAE1E2E3E4E5E6E7E8E9EAF1F2F3F4F5F6F7F8F9FAFFC4001F0100030101010101010101010000000000000102030405060708090A0BFFC400B51100020102040403040705040400010277000102031104052131061241510761711322328108144291A1B1C109233352F0156272D10A162434E125F11718191A262728292A35363738393A434445464748494A535455565758595A636465666768696A737475767778797A82838485868788898A92939495969798999AA2A3A4A5A6A7A8A9AAB2B3B4B5B6B7B8B9BAC2C3C4C5C6C7C8C9CAD2D3D4D5D6D7D8D9DAE2E3E4E5E6E7E8E9EAF2F3F4F5F6F7F8F9FAFFDA000C03010002110311003F00FD156B7FC7078349F645CE446A197A1C74AB0D6D24BFDE4E41CF1CE3D7AFF8D3A1B232AEEDD301D30C00FE99AF1DEE7515C21DBCA8E381CF5A47658BEFED4FF79B156D74C5FE23237B16E3F2E2A48ECD227DCA8ABEEA31401476799F7779C7390383F89FE952C76B231E1557FDE6C9FC87F8D5DF23352259F19E4EEE68029AD8BE3973D7A2803F9E7F9D38698AE3E652D9ECC7763F3ABAB0AAFDEFC077348CBB47DD6C28EB822802BFD9D6DD72D855519FA7E14B1DA46144AE3E6C0C2F5651E9F8F7A94E9E65DBE64937CFFC280F03AF3F97B0AA7ACEB36FE1BB7926B8B88E2B75EAD28CEDFA9E31459B02BF89BC4ABA1D9AAC3179D753BF970C7D37B7FF005B8FCC74AE449996EAE12EA49AEEE5195AE24505614DD9C282A72DD186DC72460019CD70BAFF00ED41A4C9E3A84C9E669EFF00667B68CCF0C82388939F9366779751B7208CE3E9593FF0B9AC75CBE926175753DAC36EE040939B756C01CB10331AF5079DC71CE7381B469F533E67D0D6F8D3E2A5D4BC0D7F6BA6B45F6592374B9B9FF9676D1AABE57670164211804CB1CFDEC1E2BC8757F17B78CB4E696EAFE6B5D1EC44715E5CBC9E64B7248FB88BC610280480064E47238ACDF8ABF1364BF73F65B78D6DD2164892042B6C8BCA838C0384DC4EE240EFCD79FF00C30F891A758DBC371E23BE85ADB4F46D46D2120CAD34AC795217AC84EDDA1F801093C75DE31D2C49EF9E14D2645D2BFB51A1B869AFA6DA9A7326227C1C0F918E4B718509919001049E347C6FF1E6CBC33691D8AAAEADAB227DA192D278E48E1DAC0E5DD49545E4E5412067A1C823C2FC55FB49EB1E2DB76BCBC64D1749662B05A412A899E2192417C865EA3EE81B89249E7E6F3A93E26379535A0BE9B43D26E22286CAD8AC735E28202F98D80172A4F4C938E41CD2E4EE07B7F8ABF6ACD7358768ECE7BCB796695B36DA28544808C00924AC06E3EC8E01E38AE23C53F12759D3F55FB46A1AE2E9AAA02C8B65E734CCE393BA471F7F19C0DF815E6327C5FBAD3AD2C6DED65BA636AD980C6E6358475010E32BCE09DBB79EE6A96A72EADE30D4B6DC4D6B6B220690249236D1D4E0B39249EB924F355CBA580F5DD1BE27F86F5A9A192EADF5AD5EF94866B9BB9A5BB55C0F995A2CE31FF00E7AF15B9A3FC6AD2743966F33C2FA12DAF98BFBABCD28323163923785DDC71C7CDC8C8C743E2BA17C32BCD4658DAEB56B648E4CEDC5C960DCE0602E73F97638E462B72D7E1D787742BC115F6E9A4DF8675B9310503A950D83CF6241271F76AB95B03E86B2F8DBF0FF0059976DF787FC2B6B201F21B657B76627A8E542ED1CE09201F415D9693AC6937BB66D1F54D4341755DF146D70B35BB8F639D84678FBDC67A57CEFA6691F0AA4B6444D5355D2E6B8386BAB9963BC87807802355914F3D4E3F4CD5EB1F850C58DE7847C61A56A1B555A58A2B870F10C705D5C64F5C71BB1CF7E2B3953E809EBA1F5D786BE246A1A6DA2B6B8B6B796671FE97624B18C1EF24679C74E41EFDF35DDDA3DBEA5611CF6B24735BC9CA3C6D9535F16F813F689F107C26859B57D37CEB1DCAAC62778E27C9C16F9815C9F50403E8466BE81F82FF15B45F13C42F743B8F220B97FF48B294EDF2881CB1419DA7DC6320123A11584E9B5B1A465DCF429ADFECBE21849C85BA8CC3EC597E75CFE064FCAADFD9432E71EE2A2F11B2B68C6EE3DDBADD96F30BF31555E5BF34DC3F1AD3B7F2EF6012479D8C32A4AE322B196C599925896E9DBAF150C96B8393FCEB61AD3E43FCAA19ACFBE3F4A9031E5B45CD345A0CD6A496D9F6A69B4CFE748666FD8F9FF003C515A0D6FB4F4CFAD155CA07562D360FC390690C436E4763CF1835A86D31F5FAD47F6466EDDAA89298B4C8E947D8F1FFD715A0B6991F5FD2816A18FF8D0067A5B852DC549E4B22B31DAAA064963D2AD34023957F318EF52436EB24BB9B961CAA8E76D0066FD9E428CC7E5CFF138C0FF0011537F66497D1ED256341C6557927DAADCB03178D76B000E48383938240FD3351EB171269162CDF2AC98C0DADB7D4924960302AADD836323C4F25C6836B1CC268955776E0F1E49E339CE738EBCF6CF3C735E39F10FC4BA46B57DFBDBA4B8D45A4F2E2498090DBC878DFB782AAAB9FBC01048C735B3F1D7E2F2F857446DD3473DC5C2B242CE865218FCAAD1A8F97716385CF1F2B124818AF9EFC6FE0696545BAD635263F6F4133C71DC6D8E01C9C1F3172CF80DF3720F380A315B53A7A19CA572D7C55D334ADD70D7D751F8A3C92C5C4737D92F0E4022505D4A95DC385C06C0F9BAE4791EABE2AB8BC6B5FB55F47A8DAAAFEEA41BD96C588C3464705DD772F249C6072DD2B93D7606496E24D3E69ACA3837B1691FCB77E9C63214807B0FEF773D306F7C6D3EA30C91DD2C51CC1446CF19D82E540C00C060631FC4006F7C66B78A0946C74FF163C41169FA7C735BF98D35FEE4799D8EDF30A60838C00C0367183D8EEC75F3A4D5E0D0EC7CB995A6BA8E52B1419C27CA482CDC1E32781F539E954BC6BE236D6354596E6E23B8970039625B18C018CFA81F9D737AA5DBDC48F2C7E73463F8883C0A7624DDD6FC5936A73B49E62CB3322C658C78218649D83A633C64E4F0718159F3EB8B03485A7FB45D3E433B9DFB73D4E4F1BBDF9FC31582F335C6DDCCC557207CD9C0F6151C9247032FCDBB8EDC51CAC0E857C451BBB33C335D4EE39767DABEFC75FCB6E31C55F8FC47797018446DAD95983858938523D3B8FAD72315F867C6EFBDFECF4AD1B0B8694AFCCD276FA7E157606FA9D7D9DDDD5ECDBAE2FA6645E598A96C7A73CF7CFD326BA2D220DF09FB3C87118E3F76768E7B824F27DB04FA715C4D8DE37CDE6343046BF2E4060C7F3C03F99AD0D2B51B65BA5669EEA468FAA9240C7A0E6B4B199EB5E1992F6C61DB32E9C8ECC096165BB6A81C0321E47B8C35755E16F0D68FE259D20BBD5E2D275E5DC7ED90DA47247B08CE1F604278CE46D618F7AF2FD0356F3DC471D9DBDAC417890812484FB8C9CFD735D1C3E08F146BD6CD35ADA8B85504A7D9FCC9E55FC147CA7FC9A4E2981EB63E1CF8BADAE59ADF49D37C41616CA5D86952ED7B98F1FEB920618CB0C9F917D72A79AE66D6D23B22DA8F84E4B9F261702EED89D9756ECB8CED8FA75CE549C1FE1DB834DF857FB426BDF0EBC4F63FDB10B5C25AB2C6C03186545E992B80030ECD8231C1041AFAA6FF00E157867F695F0E5AF8C7C3370B63AE341E4CD710288D99D783E721043AB630436463F1239E778EE5A918FF00B35FED056FE27D37FB3F50914C8B80A64E1B9E1908E4951D727A64E40C8AF5BF04CF1B69BF65693F7DA7BBD9BA93CE10E149EFCA143F8D7C7FE3ED26FBC15E3487CCD3D749D5946D716D986DEFBE6E65881E124E3057383ED920FAB7C20F8BFA9E9B796F1EA8B0C96BA991341772FC8D703EEF07A12B800AF04118E95CD5606F1D11F403C391F2AF07F5A8E5B6CF6FC6AC6997D15F471ED6DDE670188DBB8F7047F7BDB3F955A9AD7E4CF3C7B56057998F25AEE2302986CD87F0FE35A72419E48C7BD33C8DA32571520671B420E76B73E868AD111AF7FD0D14F9995A1D6FD909E9CD364B76076FE82B564B5F9B6E33FA54128FB3BEE659021182761E3D2ACCCA2B66C181FF00228961F2A2DCDB554753D80EA7F415A0B34326DDB242DBBB861CFD2BCC3E34FC54B1F0A6A90D95C2DE48A88F23A4232AEDC6D5C83F52704119FC28B360E563B7951641918DCD8001E983DB3D811F8F19F4A95EFEDACA262CC59B210AAAEE6DDE981DFE9C9AE0E1F896DA6E9D1DDF8824D2F44B6923F361B79EE36BAA75CC8D9186C761C9E3AF4AF3DF885FB61F86F4189E3D0AE06ADABB2870D656ECD1C09C1ED8E31FC2194647CC4715A469C9B25C8F58F1278B63D1E4B792EEEBFB2EDE4770884EE9E623180073E9D002718E6BC67E257ED03617D777967A4D8477B71BB12DCDECF94B68460B484F2CB9E801F9B83C64D7837C53FDB31A2B3BA6485A6D42643146D710A308C3649CB7390339D8AA8A0818CF53E1F7DFB4B6A5692CFF00628C5BB4CAB1891A56695542ED3C8C75E73DB9C0E80D74469A44EACF6BF1C7C79BEF11F8EA1D41A6D0ED60D043F951B9799277F946E6C609C7183DB6E3BF3E5DE36FDA7BC41AF5ADDA7DAA1916EE2FB3B96DCDB10143B5771242FC8A4807079E838AF2BD6BC7BA86AD198A6BB76F35CCA541E84F7FFEB9AC3FED56915BBAC6A598938039C7F3ED5A6A0D2D8E9CDFB6A5730C534CCDF2E379E554E796DBE801C77ACAF136B1199261032BAB811E76EDC28C71F50475079FC4D615EEBAB058EDCE6494E09CE0EDF4FC6B3AE7596BA016466618C0CF61E8050932A5B168958A0691595540C963800FB73DEA15D4E4BD8BCB0636E785986428C7AE38FCEA8CD79F69FF00966AC17A31EA063A0F41EC2A658F7DBB3AC6576FDE39CA9E3BFA55A33124D3A290B2B7988DDF636E5CE7B7FF00AEA2B8B1F24AAF0D8195EE6813479DBE62A81D428ABD65ABC71E3CC93CB55FEF114C0CBDBB54B165C8E338181566DD17CBDCCCFE5AF46CED07E87BD6CCBE2FB3B48C2C9E75D36015CAAB007D77303F80ED59B7FA9DAEA7706486D86FC7491D7737E98FD29D8965CD3F5758240DE74DB71FEACE1A3C7A15231FD6B634CBED1E42BF6969A1DC496DA3A7B0CF3F8135C6CC7C99CA959216C8F9251B48FCB3534B70D0C7B99772B7CA1C3647F867EB4D30E53D7343D1346D41E1FB3EA50C898C32B643E3B055E09E9EA6BACD26D66D0CC7F659BCCDCD9F2C1418039E339EFF00E15F3E5B5F2F4591E361FDD18E7FCFA569E9DAB5DDB3EE86EE6DD9CE5672A4FEA29F32172B3E949BC4B6FAB2C70EA1A769E2E589CCF948A49093D490DFFB2E3EB5D27C29F8E7A87C07F10B49A45E4A34B694C82D9A6590C20E3EEB104367B8C00703BE31F35E97F1035AB2CAC8D35C700AACD31900E79E33D08CD751A57C45B89A1DAF656B6FBC1F9E256DCFEB919FFEB52D1EE2D51FA1F2EABE0CFDAC7C07711DADD5B2EA47CB32413E61B80C4005D37720F247071C608C62BC92C749D67E00F8DEC74C9233796324819239C036974CE769C13950E40390382429E0E557C17C03E2AD4FC3F7B0EA1A3DEDE6977B19197B5900E38E0A720E7D3A7B57BD681F19A1F8E7A11D375886DF4BD415182BB464DADF90A371605888A462A305001D39E0639A7479758EC6B091EF3E00BFB5D4CC91D9DBB69F71901E18A62ACBDC2B46415C8FC0F1D735D95AF8ABC977B7BE8A48D93A4D1A33238F5618CAFBF519EF5F3F7C3FF186A9A259DB4FAC2AEA16883C85D4A3766B8863C01B250A3710A470E54918190C38AF6CF0C78B16EAD63916E56F74D9CE0CEAC1DADC91C799D7DBE6CE31EDD39251373A94B7FB5A2C8A4346795C1CEEFC695ADC96F97D3155ED2CE6B0957ECEC989396888C2BFD339C1C743DFBFAD6A5BAC5771EE50CBD995C6197D411EB59C908A220DDDDBF019A2B516DD5451520769358110B749170719E1BF3FFEB564EB1AD5968367349AA5D43631C7FC723ED43E9D7927D87E55D76A36327905A255CE71E660900F4E9C7EB5C4EBFE1E8FC4778F3CBE75D35BC6DE4F9AA36DB90724E01C07E00FBBD013CD6D6D752657B1C2EBFF0016A1D6AF24B7D2B4DFB734633712DDCA21813E5F9490A19DB3FEEFE5C57C81F1EBC65AB5CF8EEE7CBBA65D4210C7CAB4D3D8A84041CA923785F57CE7E86BE81FDA53F685D2FE1569B1DBE97776EB305DD25BB41BA398370A42ED1DF3B7B1C670075F84BE33F8E757D66F55B52B8C4F70A6431226C640D83F39EA49EBB4F007615D54E29233DCD3F137C7D13D94D23456B35F4CE59E4992466C1FF68C873CF3D3F1AE0B52F8A5793C72AACCD990EF711B14121ED9EE71E86B96D52E9D5DA48D97A64BF4FAFF0041596FAA3089DA46661D463815A07524D735A6B9382E4283FC5F5E4FF9F6AC5B8BD0181CB2EEF6EBF5A26D51E4972A8BB9BEE823217DEAA5C46D196DD8DC4F527207FF005EA947B969914B7A6542149F9B827DAAACB72208C01F36DE4E4F5A6DCB2AAED53EDC5529265C8FF67F84F4FC6AB6265B84F78D34859D9493D876A62CB8E07E201EB55E597CC24F19CF41511765EB4125D495BEEFCABF534EFB4347F77B0E3159ECED3B7F1669D149240DF2E33D0375C7D2803496FDC4981E5AB7A32E6A3DC4F655E3A11D6A9457325BAB0DCDB5B8E4F5A960BD2A376E5EB83B867F5A00B9728E635F32D4328395646F95BF11DFEB55E665B691A392078594F2AE0E6AD695AA476F33131246AC39316083EF820FE557DF47B7D7B69B7F2A193F8E36611C6DEE0B11B0FB1C8EBD3A5572937D4CD8EE331F97BFE58CFDD2785FA5598130BB874E879FE959F7B18B6BC68463721DA412589C7BE31F954D6B3943C8FA60D4945D92D91D3747F21EA3272A7FCFE34892AAB0FBCADD7A71F5A9AD6E639FFC4F7AD04F0E1BF4DD17965B8C2371BBE87D7DA80134FD59EDB6ED663E9B4E2B7F4CD6ADD8EDB85CABE07DED8DF98FEA0D72D368D3594A43C7340FE854D5DD31E4F33CB60AC48254AFE7FE3401DEE89335ACFE65ACCDB14FDD7FBC3D8F3CD76BA7F8919E28C466EA3B85208258E73EBF4FAFA5792E99A9EC6FBECBD8022BAEF0FF008927B5923DEB1C9B4E4140338EF906A912D763E98F811FB405AE8F74BA6F892DA5921924E6E22888284E72C7033D707038CF6EF5F42681E1268E6FF8483C25A8DAC0ACA3CDDA0B595C83C98E6C65A36031F337193C639AF89BC33AE5AEA7E5C2249E255E4051907BF3C8FE46BD1FE177C4ED6BE195C2DFE977EC14B665B77662AC071965CEEE464646719E958D4A37D6235368FB1BC39E298EF156011CF6370B1B4B269F70EA55141C334720182808CFCB91EA14D75769399258248DDA44936A3E48DC0F183EE7A8CF7FC2BC2B46F8B1E1EF8C51E9E9A805D26767DD0AC6D968A40ADF3A3E4303900104A9EE339AEA3C11E31BAF09F9D63AC5F5ADE69AD3347697B0A65B23A348A3E60082B9233D467904D71CA0D1AA9DCF6BB71BE3EEDEE01E7FC0FB5150F846F22F10E9ECD35C45E7407648721918F76438E54E320FF2E94563CA59EB3A85DC711911EDAE0CF18C950A3E6E383D7DBAFD2BE6AF8E9F16ADFC3BE1BBB7866BAB3BE688A88D2645374D8049CED20C68339CE72548FAFD33E3CF0CC9AAC6B0DBFDA04CD8669BEF2FA052A07209C64819C0EB5F13FEDB1A545E1AB07B59AE2D6E96F6F238E4916378EE1F24AB300C7382773052471B79E86BA61AB2247CCBF10A1B8B7F0C49E37D5B5C59754D4E563616864CDE1EDE7B0180ABC11F4E066BE77D7F5097509252C4B3962C4B0E79AF44F8C5E307F146B6DF34C6D2D479702C846514718E3FC4D79A6A57EB1C8DC0FC79AE8051B19174582F0DF7867046EE7DF358F7F2B4D9057BE719ABF7F7AC64F959B9E33DC0ACABF230A79CE3381D6B44AC663120F2D94EC9724761505E382CC1571C53AE46E88C8376180504551B80615FE21B86D391E9D4530295DBB6E6F98EDEC3D6AA4F96EDB47BF5AD05B6594632BEDC543756BB1B6EDFC68028B2E40C2FD69A772FB549229466FA1A8CB1047F9C50022263D49A9D047280BB591FEB907FA8AAFE664F561F4EB47DFF00E2939EF9A00B06CE409B95E365DD8DA5C127F0FEB4AB67E5C2CCD246ACC0FEEC65989EBD8638FEB502C385DC1A5FFBEAAC453DD45FC2CC3A02DFC5F9538810EF541D768EC7B55EB0BCDDB7127A73C11F9534379C07EEC42CC724C638FC739A95F4733B7C91AFA903E5FCB1FCA9EA296C69C705AEAD132CCCB6ED8C2CB1A9DB9E3A8CE3F9555D57C1B79A79DD0AB5D46DC896343B08FCB23F1A82387FB3DD76CF342FD06E079FA9AE93C35E20934E5F2EE17CEB7243148F9DDF87F862AAC4DCE5ADAE7636D65DA7D3FCF5ADDD2B5168B052561C647CDC8AEBF53F06E9FE2FB08E6B1976C920C912CDBA243DC6482C87D89C0F6E95C8EADE16BEF0C5FB5BDDC12C322F3B5D4F3DFE56C0DC314583D4EBB40D6E0961F2EEA359118649C0E7F0AB12F826D6EAE566B68EE24899895F2930D18FF74E3A7A8CD72BA35F472F05BCB6ED9CD755A25FCD143C48636C6F5FEEB7E3D41CFE1D28119B3E8D6F68EC05E48DB4E3CB9A119FC0E473F4A92CE6F2BE568E5551D181C715D23EA369AE6D1AB2C9E620DA26650641F53DC7BD33FE10D8650AD69A9DBA8638D8E08C7D4E08C7D7153CA3BB1349D4AE2509B26DCA3B6EDADF9D76FE17F15F953A899A7C29C946393F506B94B5F015DC4F9CDAE578CC3383F9F35B5A669171A66EF32E155860AE70C3F11C8A108F65F875E3CB5D3AFD5961564DEAD7104F18656C1E0800E3233C1073CD7A9F84FE2558E9BA9E9FF6A75B8D2ED8ED65D989214624920E72F81D093918519F9457CBD0EB5340BE5B7D8E40DDC445723E838ADDF0FF00882EE59A35B78D84CB8D814EE663EBD38C7BF159D48A6544FD08F03788EC744D35FC9BD86D56E0AB84976EEDBB46D383823E52383CE73457CE9F0CFE1E43E28D3E6B8F186A1A84933156B7F25959541DDB8027E53FC272BC73ED45737B14F5669CCCFD29F899E2D5F0A68735CC2D0C772AB93E7676838C29EA3A67E9C93DABF39BFE0A0DE28B7D575E8961D59752BA605A510C6EB1C7B4ED04138DCCC002491D36D7E9978A3C39FDB7A77911B087CCF964619DCCBDD47A67B9F4AFCECFDBCFE1949E18D635BB9DD6967644C7044160DAB76AA49201C00A1481C8C64B0EA6953DC7D6E7C25E28BA22770ABF293D715C66A52166DDCF5E066BB0F145B34739FF006B902B93D455B71F97E841AD8B306F383CFCBEDE9F5ACDB9633498C7DD39AD5BD90B11FAE6B3AE89761B77FCBF956C88947A99E255DBB4FCC3D338ED50DFBF9B22B6E32ED00127B1A92652ACAB803E839350DCC780ACBF781C30F7C0E7F1FE628172BB0D1179116E6658C139CB1E4FD00FE754EE1D9C75F97F5229649A43274DD9EA48C9A63336E51B41C9EB414A1DC85AD5986E5CB71C80781F5355E43B5FE6C0F4ABD2433797C06553C062703F0AA324650F7E3A9CD01C888DDC86F94FD7DE9A67661F770DC77A738CA7150B2B17C8CFE3407B3438B6E19CE78EE7A54D6D308FBB75EC6AA01B4E46E56FAF6A09F6EDD7D682651B1AF0B5C46B9494C81B9C31C83F81ABF61E259ACA48D82AC722FF001AA75F62BF74D615ADE496A0AABEE8DBD79C1ABF6FA8B2F0CA8CC39C29E1C7A8AB449D969F7367AE0DDF618A6DA9978A12C037A90A4E548F6E0D22F87A3B81BB4B92E2390FCCD0B80EDDFA743F8601F73587A25CDBCB728D148D04CADD4E700FD7AAD775A6594D711ABCBB6452A184D1A0F9BEA477FF006875EE334C87A19FA3EACABFBCB88A586484E3ED16E7943D837F1019EC471DABB4B27B5F10692B14F3432599C658444F947D40C7CA09C6718C67231C8AE7F50D2A2D426122AB79CA998EE223F3301D8F6CFF00FAB1DEB3EDADA7D16F1A4579226DDB830E8DDB8FAF5FC2AB6DC427893C19FD91A96C560D1B9F964CE02FFB2C7D78EBE950D81BCD266DBB5F728C79528DCA7DC1FEA2BB3F0E789975785ACF51B68A78E4C2925BCBF9BB1CE33ED83C7F3A917C32D6175E5249F69B1917E538FDF5B1CF75FF000E0F4F43472818569AD41A87EEAE93C961D17B64FA1EA2AEA69933053032CD1B7191F780F71CD6A5F783A2BA7DBF6563756C70FB57F77711F5DCBE8D839F700FA1AA17BF0FE681DDAD669536AEF5503961EA3D8020E7D08A3958082CAE5A65F3239180E0311923D877AD8D2AD6F662B1C6D22AAF003311B7F3E9589696BAB39DA9710C8C148DB281F37D08C67EB9AD1B4F106ADA3C9B7ECC8922E37001F20FFDF5FAD481DA68FE12B8BB55F32E372E73F2EE6E7F451F9D771E1BF0C1D3A1DBB9630C72ECCDF3381F4CE31F53FE1E7FE1EF8A9A9441639228DB675F9B247E3F9D771A1FC423A86C4B8B76DD21EA87691EDC11438AB06A7D39F03BC43E076F0DCD16B56F70C6375F259324B0DA0124E7D57A74FCE8AF3AF87DA6AEB7A5CB2F9D0C6AB26D0642F2337CA0F41C8033DFBE7D28AE795377DC2E7EB0DFB3247F2B2C5C6D1C6E2DF45047F3AF8B7F6EFF00035E78C759BF7B8606CF4CD227BCFDF3EF36A432AAA85FB9B9C96278C8DBCEDDB9AFB6A587CF183BB1EC6BE6BFDB9B499343F82FE2AD42DEDF0DE44768EB111C0666C038F4DDC2F192C4F24D71D39599BC8FC95F155B473DFC9B82EE9137A0E14671C6171E98E07B9AE075BD4A4B35650CDEA51E042A0FB67B5779F1220CDFCDBA364F29B69DCBFC438C1FC8D79C6AC183965257760919AEC8EA1CAB76656A170D70E7E65CE33940416F6C607E759D3EE89972039EBB49CD69CB1C92FCACCDE5E72484DC7F0158F772FEF3D4E7938C67DAB41C75D0A9286946D25546EDC7E5C67DBE94411A92CAC8A4118C9EB9FF003EB52BDBB28DBF953E3B3324AACA1AB3954B1D118104F6D283B5D95828F972738FD6AB9B164423F8BD71D2BA0834C575DDB7054E0F70D56A3D0D2E8E7E627B67B572CF1091E853C1391C6C968C0EDE49C1C64F4A8E4D2B2B9C576D3785548F957777E9502E81E5B7CD1953F9D67F5B5D0DBFB34E227D38AF1B5BEA6ABCBA5143F36E1F415DF5CF874B4676C673EB9ACE9B40767DBCF3C71DAB48E2D7533A9973E87166C5B0796C545E4E0FFBB5DA4DE176518DBCD55B9F0E8542AC9B7771C56D1C4C59CF2C0CD6C72BE4293D1B8ED572CFF7CEB0B0F2DCB66373C107FBB9F43FA1FAD5ABBD19AD8FCB93DC5411DB8236B2EE5EFC74AE88C93D51C1529B5A32CDBC4B3AEEF9639573D7E5C1F4FF00F5E3D2BA6F0DEBF75A488595B69C11C7DC90673C8EF9CF51E95866D269EDDEEA363279400987F160F009FC7BFAE0F5CD244F25BED92D5885C92C87E607EA3F207DFEB5A1833DABC39A95B78874D69AD3CAB5D418847B62E0ACAFC9CA9EC480703AE78CFAC5AE787A4B285668E1F322943651973B4F3946FAE3AF6EBEA2B87F06EB969A98FB3B33595EC8BB486398663918E7AA1C804376EE715E9FE15F127F6FDACDA7EA0CD6F7917CA7CEF96646E082C3DFD471903D6B433389555B6BA8641F35ABB6C8DF782623FDC63E9D467B63B8AEABC3BA906FDCC87ED0AD948F276C8A4F553F971EB8EE2B2BC51A47F60DE5D3F93F322ABDDC19F9645E00957F319F6C1EB4682F0DBCAD0C9974650D0C84F5523A13EDC723EB401D8586A90DA4B0C2D3CB2A4C4085BCCDB246FDD430EA41C70D9F6AE80DC2DD416B3058EE1A193CA903B15621B2377B104A9FC4F6E9C9FD9C5F40E925BC8D3463CC4655244A179CB2FF007C753DFAF635B3A5EA1E64CD6FE72B34CA3C9620379913F391DF2BC8F505587154A5626488EF3C3CD16A73C7132B4D6F215C15DA7729C1E073EA73DFDB9C4BA7DBE6469A68D66120C0650245EBD7D31EDED5ACDE65F4CB36F68DEE17E7902F3E6636B1CF5CF07F3A564F3A62F32AC6A8488FCDE0A0E80161CF239C9C839EC6A4929DAF85F4FD52E15ADE4B7B768F0D247FC07D31CE57F0CFB5755E1DF0BC366377DA14951B76A6030FC49C7E23A0FAD632218E6DB22AF98BD171BDD7F3EBF91F5F6AD5F0F5B2BCE25F32655E87780157EACD8E7DBF4A9B0D1E83E12D6AEBC3D66CB1CCD6DE6633C677E338EC7D68ACBB2BBB5D3571712891A4019485DFC723B103D7A13454967ECA9217D6B8AF8DDE08D3FC5FE04D461D423592CE18CDECCAEC76334419D7701D47CB8C77E2BB0673D792A7BFA7A7155759B36D46D268582059820191BB241E063DF8FF00EBD78F1DCE996C7E29FC7CF87B75E1CF1D6A1A7DFF00D924B97B81E631611ED91F32B74FBBB772AE3A673C715E29E29F0F25BCCE91C91F1F3332E471C67AF6F438AFAAFF00E0A636D1F85BE30DD69B123798ABF68B8724FF00A43BA28DE4FAE179C63073802BE4DFB5B492C92DC36E8E253C1C9C9C6147E7EBDBE95E841F622473BA83A584ECADFBD8F0074FE1FF001158125B89EE8F97D33F2AF7AD7D6509964DF22B73FC3C8ACCC6D7F5A1CAE694F7123B032B9057E6CF718357ADB4F6B53DC86EE075A9B4FB6F3655DA31BABA4D334777452E0703D2BCFC456B1EEE070BCDA9976B69B133B4FCDD062B4A0D33747D30DE82AF3E99B07CBFAD4D6F6A635FF6B3D3D2BCA955BEA7D0D3A296854B7B2F2C6D3B7819E69EF62853B11E8055B11B6EF5C7A52C71B67DFAFB573FB47B9D31A6B63365D1BCCE39504F6A8A7F0EAA7CDFC3EB5D0436E4B63F84559FB046E98DBB8119C1E94E35AC53A272BFF08B79B6FB954329F6AA971E103BB95E2BB31A2C71B70A4639FBD8CD4874B927855B7B6DFEE91D2B48D6B3329514F43CC756F0AEF07E5F9B3D7D6B9BD53C3AD00F957E6EDC57B25CE85BD3B1E7F3AC2D5F404895BE43B579E466BD1C3E29AD0F2B1597C64AE796D9B3D9DC6E1C30383919047707D41E84771525CDB2DAB2CB0E45BC87A0E7C96F4FF0F51EE2BA7D47C26B2B33282A3AE476AC95B0934A98A955915FE5607EECA3D3EB5EBD1ACA68F98C561654F7218EC63D4E36F259619D70480DF7BFDA06BB6F0B78A61BCBD8ED7548F72360C130E0C2CC30E067B16CE54FAFBE6B8D361F60612237EEB39472398FD9BDBB7EB5B46132D8C737FAB93955627728EE15F18E0F3B5ABA6F63CF91E8B7CAD7B64D65263ED91C79B1BC0C025D47B81313FBF040F7C8EA4572F61FF12D9FCB902FD9D8ED601BFD4927D3D33F97D1853B40F16B4D6525BDD190291B99090C61907F129EA41E091E98239008B9ABDACD791477053E6C00F81919C673FEEB29EBF8F4E8F9893A1D16F6408DE5B7993C0B952BFF002D4283D7D0E3F903DAAF6A374AD045711EE92CE4208D836BC2C7966E3EE9CF3E9918F4AE5F43BB96D155A16F95F1C9EB0C83953F9F5EDD7D6BAC4B88E7B55D42DE15FB1DE13E645FC313AF2E9FAEE5F5E94730168F881ACFCB91805FB503B0AF0B9EA5973C739E9FEE8EA09AB91DEB5D3C7B8C8B7040D8DFF2CE519FAFCA471819C73F97376AFBFCD89B9B7600E07F08ECE33F5E6A6B5D466811615F9A58B2D1380537724EDC74C74FC49A3980EA6031DE49E4CD6F06549DC0290C07FBBD07B018AD4D3E385E68E382DC48CA7F8989C738CE36838F7CF6EF5CED9EA92DE36EF2E39324FCB282307D0E38EBC673FD2BB1D09EE25DBFBB8138C904EE1C77FAFB64D0D9296A6843A5C978CD2379933700F950EE55FCCFF2A2BE8CFD977E1443E37F06DD6A122FDAA479FCB20B18CA63241257AE41079E47A0EE573CAA24CD63B1F7BAE95E285421756D226E7ACB64CAD8FF0080B81FA531DFC5D6F285117876E94F5C79B09EFEA5ABA511E5692484BA7CADB48E41ED5E5F31BB3F27FF00E0A9DA0EA49F1BAEAF752B3B6B5B8B880337953F980A82C1739E87680781C822BE3DD534F686CD76EC769919F1D3663FAF5EBEFF005AFBD3FE0B03637579E3ED0E4C2A8D52292EF038F915846A7900E0840707EA319AF8DF5BF0D6F915D14148572F8E703DFDF9E9EF5DF4DE9732B9E4B7F0E033F23B0E3A9ACFF2FE71CF7AEB3C5BA3BDA450BFCA15C6F503D0F4AE5D626F3405F5EB54F637A7AB4745E16D284CC8DD71C1AEC23D382A2AAE41EFC565F81F47F3515886E393ED5D635A6D8F953F28CE7BF15E1E225CD2B9F5D818DA260DCDA189B691DAA131E76FF3C56A5DA1940E3B73ED55FEC831FE79AF324F53D889516323FE042A5485B774C679F5AB31DAE07DD2D52240DD95BF0AC9C8DA22796CA7EE9F98F5ABB15B9545F6EDFF00D7A6C50B381F2B703B1AB90AB3282178E38269731A59912DA79EBCF1ED528B336F0FDEF979AB1E59566C2B71C64F5349F33A6D3C678C6288BD4933160F30B6D8FEEF1926A0B8D27CF2DBBF215B1345E58017A76E2A1B845C060BF2FD335D14E5A98D48A39BBEF0EC6E0E14AD737AD787936ED2ABB7D4AD77935CF9B275CEDED8ACBD6615955B6AF6E83A577D1ACD33CDC4508CA3668F38160D693946190C7038C86FC3FA77A922B4FB06E65DCD0B1F9D41CEC1FCCAFEABF856EEB16314EACAA4E7D3A551B3491EE364830C01C1FEF639FCF8FF003DFDFA15B9D6BB9F1F8CC2FB395E3B105E6992A4676F25D77C2E0FDEEE57D32473EFED5ABE17D7647861B7918EE8466063C1C6493191DF04E47E23B9A6DA592C96CF6ECBF77F7B101DBB9DBFA9C7D7D4D53934F6499A41F7E3C6FC7F10ECFF008F7F7E7BD741E7F29D15C5A986537502EC19DA514E4293D07BA9EDE9D2B5BC29A98B3FB5DACC36DADE6D2CACBC0209DA7F33CFB138ACBD0AE4DCC0B9DBBCA9F94F21D7B83FE7DEB44C0C6CE429E63465915D0E498410FBBEA3A73412F42E6A7A4B5BCAD35BE5A346C039EA1BEF2F1C7B8C7AE7E8B6A8D35C47BBE62870013F30E3A37A9F7F4EA0F67681AE3468B9315C26D6528C7A8E011EFEDF503AE0D6F6990E9B7B0892DE6F27701BE190FDC393C67D3DC9E3A1A00B1E14D218CEDB964F29BE524A8C7E67B838FCABA88E75B0B636F12AC859B0CC5FE67278193DF1C9C0E3BF5E99379AB41A65BAC6932BCCCBB7729015477FBBFF00D6ACF4BAFB5BF970C8AD2E772A460EE049C1EDDF353263B1FA0FFB3BDCD9FC28F022C7B2DDA3D5196E8C6D284F2E4DA158A96524A10148040239EA72015F2C784FC01E39F1BD879F67A2EF58D5410F69E60418DA00DC1B1F74FA1F5CF145724B5772CFD7C10F14924031CE78E7AD4B9C0A6B82CBF29C7BFA570458EECF8E7FE0A5DFB3FEA3F10E6B6F105BAC771158DA476514091992624C8CCCCA3B60023D38F5C57E78EB1A24DA73DD060DE4AA1011B83B890791DB1DFD715FB81E2BD023D734830985646491245563FDD3FE1BBF3AFCB5FDB4BC35A4DBFC75D6AC7C3A60B8D3C5E969C2285685F3865CA93BB18CE7804B115D9465711F23FC4C8163F2C2A8D8A9B17E5C642FDE3F89200AE2346D37EDB7F1A9E413D857A67C7FB58AD75A65893CBC46142A8EBC727F9573DF0AFC3526ABA946BB772EEE4E3A569565689D98387333B2F087855A0B22EA0AEC19CFAD58D5A2DA772E57B63A66BB89B46FEC7B4789B71DAA02E7BAF63F9571BABA659BFBBE95E0D63EB70AF530648099083EBDE9CBA7993FFAD5636293F8F3EF57ADE38D9401FF00EAAF3A573D38B33A1D3767627357534A0114EDE71D874AD783483711F156ECF4A6D8DC720631DEB195CEC8C958C35D2779C2AF7E6AE41A40882A95F7CD69C968D11FBBF51E95A9E1ED3BCF6C36E61DB7546A6BD0E79743980F997E51551EC9867E565F5AF43BCD22330F4E3B564CFA32C9B7E5FA9AA8DCC4E36EED593FBA6B3DAC6499BEEB600E95D7DE685B24FF00773496DA31DFFC27E9EB5AA9B42714F7395FEC32F17DDC1EF91D2A3BAF0E332F0A41C7E75DF59F86A4756DC5769FF62893C312249F246AC3B9FF0026B58547739A513C8F54F0E61DB7C7BBB96E6B9FBCD2DE37DD1AB2B21DC0E3907D6BDA353F093C81BF76C3B062B8AE5B55F0DC9039CA01DF20120D7A986C4389E56330AA699C32C0B390DB446C3960178078E47F853A5D3D619154AFCBD179FE13DBF0E6B767D24A6E640C8CBD463AD4474BC449333654370A7BD7BD4EA732BA3E4EB51E57632EDF4D6B2B93F33218DB7291D8D6E4304B756F1BA2797364BE036327A71F974F7AB161A7ADF9559393D188F4CF3FCEA4B5B06B9D516108642C000A7AF03B1FC3E95A46472CE3D87D95BC724FFE91A7B2331E64423E6FC302B5869D6E5B725BB798BC86F28B0FF81038FCF91FCEA7D3E1933B597CCD8392EDCAE3D5861BFF001EC7B54D2BC535AB4712AC926DC925B715EA3D71EF546267DC694B71F29C46BFC5E62E00FF00754741DEBBBFD9E7C116BE22F8B1A1D9C6B15D25D5FC4B2248DB55A307CC7DC4E300AA9F7AE0EC9241247E63063F7915800A3DC0E807BF00D7D01FB03782D3C41F1BEC19F73269EB25C0901384750029E393CB741F5EC6B1A8ECAE544FD09F095EE97A2E856D6F611C36702C4A4416E9811F1D085E9E9CFA5154346B48F4D59AD9A7388E4322A84F2D407F989008CFDEDC3249E945796E5A9D47B5F9FB3E5946DCF1BBF84FF87E3530E95936DA9CB1233DC471DBD946BCB4D20DFDB93FC2A3AF524FD3A55AB49FCEB7592DDB746C3215815E3DB3C8FC6A6C63CA729FB437C406F865F08F57D616EA3B39218FCB8A6906E58DDC85048EF8E7F1C57E477C40F104DAB78C6F756B6BEB858EE6E5A5918C9FEB493F36E3FC39F4207D6BF433FE0A8FE2DFECEFD9EACED63DD1C979AA2EF56183848E43D3EB8FCABF303C43A8C968B98E465F341563D71FE4F3F95690A96958EEA3848CA87B47B9CE7C5BBB8754D75644819D658CF96049B990AED249EB9E03F1EFD6BD33F66BF85B6ADE19B4D4B7876B891F6851BBA67824743EDEDEF5E4FAD5949676B69AB5FB4C6D6EA49ADE19108662CA177E4120E30EBF5C9ACDF05FC4FBEF87ED2AD8DC5CEC676752876F53D71D8D7755A7CD15633C2CB964D1F48F8BBC3621B096E6416F1B6D3FBBDF96CE3393E83EBCF3D4D78978875592DAF1A1665620E091D09ACFB8F8D7AC78A4C91C7A7DD5E48F8DFB646763F5014D67EA2FE22991A59741F255FF008A52C3E9D6B82A60E5277D3EF47B5471918777F22C49AD90783C558B0F10AC12ED3FC47939AE65AD35B53B859D9F1CEDF380C7EB51C8DAD42C19B4D8D87FD33B85A8FECFBF6FBD1BFF006859F5FB8F54D1FC430B40773A861D474AD6D375E8659392A76F4E6BC49BC47A85905F334FBB8B1DC0DFFA8A587E24CB6C76EE64ED861B6B9EA65127AC4E9A79C462ED23DF85E5B5CC87EEFCDDFBD68786D01327CC36E703D6BC3B44F1FCD2CEACF336D1C815DB697F10D61F2D95F71C60FCD8E6BCFA9829C1EA7AD471D09AD0F4DD4EFD515A25DB9381D3A555455DBF2E189191CD7157BE3A17077AB36ECF5CF5AD5D13C4D1C96E1B7E3FC6B9FD9B4CE88D44CD1BA5DA7E6F98E3247AD3A30B193F5EBEB5997BABACF2EE0DF527D2A397C43E4B6DF9BF0AA5464C5ED228EDB488C4ABE5ED55DAA38ABE9A3E5B851EA4570BA578DD2D2404B9071D4F6AE92CBE26D9AB6E791576AED272300D6D1C3CAFB1C552B47A3376EFC3825423E5F9BF3AE5F5CF0479EC76ED5E3923AD6EDAFC43B5B8914893E55C10C39DBF854EB7B1EA2F88559F71C8DA79E79FC7E9CF7AEB85368E29D63CB75AF00CB6AC64DBB94F19AE6354F0FB40248E45C2B8FC88E95F42DAF8663BA9564917311C87C7AFF12FB1FE7F5E6A9EB9F02ACFC436DFE8775144D2E70657DBB1874047E1DB35E9E1E5CBB9E462A0A7AA3C0749B668EDFEEE644396E3DFD2B7BC35A1C8DAE19E1819EE576FCA0671FE735D1DD7C1BD5F49BC9150446E22FBCBB80DA73D32783D33EE0835ABE11F877AC5D6A8BE4C2B1CCADF3280ADD1BA60F539E99E3DEBBB995B73C8F66D3B58C6D6B4190846284315DFE4A80A411DDBFBA07AB63F0AC03A8BD9DD62158249632712468063D70700F1C8CF1F957ADFED0DF082F7C09E0AB6BCBD99E59AEA50241B8FCBC138C600C8C76CFD4D7893B7D9F5886156C6D6192A7EEF4FE84D6B4E4A51BA39AB41C67666D47A649A96A2DB8AE6621D792773639C8E87EA31D2BECEFF008277782A2B0F07DD6A8D085B8B8BA6D9900B88D136743CE0B16F53F29AF8FF00C25A15CF88FC7B65A7DAC735C4ECC91C71C632E48CE71C7A73F41F5AFD3CF865F0D6CFE187826C747B689435B463CD93F8DDF1C927AE739F4AC7132B46C4538BBDCD5BA9A6F3328CCA71B49543CF53FD4D1539507FD67CFEE4628AF30E83D7E6D221B8B849A48D649233942C7210FA81D01F7033549A19ACE6596492E279DB3E5C302ED8C7D4E79EBD5DB1E801AD846F91777CA71D33D28618068466A5DCF9E7FE0A3DE0997C6BFB2DDF5E4D1A4775A1DD4576A11B78D8C7CA6E703FE7A027E95F963A9E9D1EA08D0CDB90A9C6F1D56BF693E3AF821BE227C1EF1268AACCBF6ED3E6441B7259821283DBE603F2AFC72D5AC9F4CD4AE24655F2D4B0C37AE3BD4FDB4CF6B0728CB0D28BE8CE33E2941650FC38D2ACEDEEA19EEAD2FA792744CFC88F1C615B9EC4A1E98E4572BF0B7C1D6FE2EF18C16B785BEC71A34F32AB6D6755E8A0FB9C74E719AF48F80DA70F107C78D0A29D04CB3DF80E8EB9575C31208F4C71478CFE1F47F06BF690F1368F6BF2D984792D0631B6276570A3FDDF997FE035E83A8DD376E88E2C3D24AAA4FA9D6C17BA7687A747676F6F0DBDBC6432C71A85551D0FFF00AFAF1585E32F887A4DA218E2872D8C10318C73FA7EB5CCEADA8CDF36D91B701F88AE567D16E2F6E59A490B2B1CFDEFE5FF00D6AF363513DCF6E545C57BBB9627F1B45A8CF2C7A7D935C794A5DF83B5546067A74F7AE7B58F896DA64DE5C9671AC846768C8EB53B69ADE1FD616EED6468D94E411DBD41F63E955BE27A59789956EEDE16D3EE36059392F0F1939E995C93DF23DC75AECA5ECDBD4E5ADEDE0B9915C7C4E91A1127F66EE85464B03F747A9A8A7F155B6A0416836C6DD4E0329AE6F44BF9B4DD423FB2DBC7A833650C1346268E427BE3B7D45776DE15B5F0CFC3282CAF7C96D43734B27F7933D141CFD7B75AE87ECE1AC74673C6A55A8ED2D4E7E6B2B66C345984B74788E3F4E94FFED5BBD261F34B2DCDBA1C33A7CAE9E9B97FA8C8ACDB597EC770B0965F2E619504FDD27A62AE343BA265ECC31915A42BC27EE568F32FC57CFF00CCE9745C173D37CAFF0002FE99F112D269555A66818F1FBC185FCFA5763E1AF15DBDC15C5D4241239F3057882C4CF2630C5F38C01DEBA9F0EE817595F3ACEE634E3E6785947E64563532EA3276BD8AA79B578ABB8DCF794D5F4B5B457B8D42C61DC304BCEBD7F3AE7B58F881A4D9CBB62BA5B839E0448CD9FA1C63F5AE2752899E782CE15DD24C551157F898E0015DA4BE0CB7F05DBC31AC6B25D32FEF67619C9EE17D07EB58D4C1D0A0FDFBB3A28E3F1188F85248ADFF00095CD7EBFB8B1B82A7A17C203FCE9237BE93F8628FBE0CA6A5BFB9FB1DAF98DB999BEE81DF1FD2A92CD7C6C66BC5FF00550A963D31EDEF5B519452F762BE7739B11CCB5949FCAC743A1E9DA9028D1C96FCF404135DDE8127889C46B1DADA4CD92CAEAEEAC7DB3CFBD792E85F106FA1997E68D467B8FF00EB57A37817E296AE352B4B55B586592E1F0B94215BDF3FD718AE8E67D69C5FDFFE671FB6A69FC725F71EA961AE788A00D24DE15BB914E37F9170486C7D57B73D49C7B54D07C42D3ED6F556F6D754D3947DF33DB6401F55248C7A818F614FF08FC757D06E234D52C9ADC67192C48E7F974FCEBDA7C15F11BC3FE39B6F2A6FB249232ED11CE88FF28E83E6CFB9E2B09D7C3AD2745AF3527F93BFE66F0A739FF0EAEBE68E07C3D27877C6F751FF00C4EB4F668D76A0697CA90939ECD827AFE64FD4FA9F86BC3FA4F846D956DED638CF1F3E32189C631FE4FAD71BF11BF66EF0CF8ADD9ECE33A4DC483292C077479FF690F18FA62BC1359B7F107C2BF11DCE946FAF2CE6B7C1CC13B2C5321E8CA3BA9F71EA2B18D1A559FEE64D79326A622A61FF008B14FCD1EA7FB4FEAD17C48B9B1F0DE9AFBAE3ED2B24927F0C4BF7067DC96000FF00EBD78B7C50F82B0E81F143FB0B48324FF638234B894B64994FCCE493C0E08E3B74AE83C11E24D45BC40B33DD48DF676379D80692305D4B0E8C3E50307D7B577BF0BB44864D2E7D40AFDAB58B9966927925196572E492DEA4F06BD3A988A586C0AA508FBD7BB7F925E479B468BC6639CDBF76DA2FD5995F047C07A4F80BC423C45E2493ECE618DD6081188799DB8127AF033C01E9EBC7D95F067C751F8DFC2A6586479A2876F96EE72FB0E7009EE460F26BE19D7EF26D4750DF333493487E6673C9EDFE457D7DFB22E8D2693F0C64924565F3A5545C9FEE8FFECABC3F6D39CF53DCC76068D0C2F3477B9EA4EE73FE79A29AECD9F973F80A2AACCF00F609EEA4655F3A4FB146DC2AAE1E693E9D40FA2EE3EE285B936D1A975105B8E17CD62F2C87D8649CFE249F41573C85259970B232EDDE00DC07F9ED555AC5A0977C7B55B6FCF712664931E8076FE5ED468CC0B505C7991AB6D64DDD038C1FCBFA57E47FED7BF0D7FE15B7C6AF1668F02B471DBDEC8F0E57A44FF3AFFE3AC2BF58557C97F3B1E59FBBF68B93BA46CF655ED9F4E39FE1AF873FE0AB7F092487C4DA4F8B6DE390C1AB5B9B2B86750A4CD18F9588EDB90E3A0FB952D25A9DD8296B28775F91F1B7ECA56AD37ED15E17DDD56F093EFF002B015DFF00EDBFE181A6FC5ED2F5AFBDBDDAC6EA4C60FCE37213EA38619AE4FF006583FD9BFB46785D994307BF44C119FBDF29FCB35F447EDA5F0F7FE121F096A089B4C937EF20217FD5BA1F94FE600FC4D75D1A894B5D9E8FD19D1CAEFA6E8F91F52D3444CDF2E7D7E9597716197F97EBC76ADBD1EE3FB6B498A465FDF2FC92A639471C107DEA75D32395D97BFAFA57875A4E9C9C1EE8FAAA318CA09AEA7173D9AC939122655A9A745B57DACACF13F42382A7F4AECAE3C3D192372EEF422AAC5A2409291E5FCCBEB446A3654E9A48E663F0EC31A332181988C02B0ED3FA567EA5E1B89E1C3C09BBAE76FCC6BBA96D2388F45503AD5791A14DCA537FBD74C2A3472CA2ADA23CB354F08C302AB470856CE7207354B51896C6C3737590841EE4FF009FD2BD07C4AF6D12BF0A770E83D6BCBFC5FA9B5CEACB6F1EEDB00C003FBEDFE03F9D7A1839734D396CB539714B969E9BBD0B3E02B40DA849718F9A67243118DA327A7D6BDD3E1C7886D3489616B8C790AC0C87D403C81F85799F80FC2534B6F1B6DDAB8E9EB5E9F6FF000EAE62D201685C330CE0F6FAD7154C446788E66FA9DF87C3F2E1F93C8E63E306A3A2A7C68D3752D0445F676659648A3FBA25463C8EC370DA78EF9AEDBC6DE1C6B9B182E213BA19956657FEF291907F1CD78FF8CB4A9340D761B865655B79958F1EF5F597C0FF00048F1C7C27850796D358BB5B9DDDE33F34641FF7580FF80D7A99852F76334789859FB3AD2A7B1F3AEB5A35C5CDEC8C3CB6898031829F71718033FE79AB1A45ACA9A64D69240B246EA55B1C3107EB5EA3E3EF843378775165D87C961B9180E077C7E79AE6EDFC32F1FDDDC07AE3F9D7043116D0F4A585F68BD4F3EB3F879A9CD37971E9F35C46C78650338ED9F7AF7AFD9FB43BDF0D34773AA5BA493DAC6D15940CDB5816EAD23671C7E7D326B27C37A53DBCABE65AC732839EA5735EB7E029160F2DD345F2DB18123306247B67F9D39E3A4D58E6FEC9A69DD9A3E1FF0081327C55D4E4D4753FF47643B86C1B6DE1191904637313C64F4CFAE4E37350FD9DADB4E5596CAF5BCC4C6005071F8E38E9D339FCEBACD0F51BFBF58D5B16EB10C0443838F41FE35D2D9699F6A0B1AA36DC16C7718EB53EDDCB42A5868C5F3239AF0D68B78F62904A598A00B9CF5AF22FDAFBC253695E30F0FAC8A4CF7162E42A8DCCCBE6E1471D7E6DC057D6BE17F07C71C5E66D3B5873DC74E6BC82E3C3507C54FDADB50D4044B268FE0B48A007AA493AE481E9FEB4BB71FF003CC7AD6F42D4D3ABD8E2C5AF6B6A4B76CF26D73F679BFF0083DE026D6354BAB7FED2BE458458A29220DF8C877CF2D8041006064F26AAFECF5AE15F17BD8BFF00ABBE8F2AA4E76BAF507EA38FA8AF4DFDB53593078774FB70DCCD759C7FBAA7FC6BC8BE1359345E2DB8B96631F936EF708C3F85C11FFB31AE88C9D4C3B954EA72C69C68E3A31A5B2B10E91A3B6B1E325B751F2F9C73C74F9ABEE6F00F87D7C2DE0AD32C0FCAD0C2378FF69BE63F9138FC2BE75FD96BE1AFFC241E35FB74D1EE82D5BCF6C8E0E3A0FC4E07E75F4FCF2B67A7CD5C14E36D4EACE313CD2549741402BE9F9D150EE66FE1C1CD15A9E29ED106AAAA819D5923380AD21C339FA7F4E0FB55C595641FE22B91F0EF896CB56B2FB7595C5BDFC53749E3977F07B6EEC3FD9AD28758699D558F9218ED48D06E924FC7EEAFF9E45677EA12A66D8850C9E66D5DD8C6EC72057947EDB3E0B8BC6BFB3A7889678D251A6C22FA11B4960E87AE7B7CA4FAF5ED5E956FA99F33CBDBB9F81E5A1DEC9FEF37407DBF9D2EABA75AF8AF45BEB09CACB6D7913DB4C07390C0A91FAD344D3F764A47E2F78327FF008447E2EE9174DF2C70DFC52EEE857E70735F657C7D31DFE8324722166DEEB8EBB55995C0CFFC07F5AF9EFF00699F803A9FC15F8A771A55D46DB637F36DA5C616E22DDF2BA9F7C0C8EC78EA2BDA3C5FAEB7887C0BA55DBEEFF48B38D9B2323A007A77C8FE75973369A67BDCA94A328ECCF8B7E235A5D7C3DF135E6A50C2D3E9B79216B854FBD0B7F7C7B1EFEFE955F47F1659EAF1F9D6B711CC18648070CBF51D457A778E2C7CC9E650BCB64824F15E3FE24F86BA7DE5CB32C26DE707FD6427CB61F80E3F4A89CA9D54955D1AEBFE67A9421569BBD2D5767FA1D11D6003DB3D0F354EE7565331F979C77AE3E6F08EABA57FC796B371B57F8674120155E57F15403E59B4B997D5A365CFE5511C3C7ECC91D4F10DAF7A0FF33B19B50DC3EEE0FAF7AA17D7594C75EF5C9DC5C78AA4F976E92BDFABD51B8B7D7EE11BCED520B60C0656DE0CB7FDF4DCD5FB14B7922155BBF762FF00226F1B788E1D162F98EE9E4FF57183F337E1E9587E02F06CBAF6A62E2E73BA46C8CFA9E49357F48F0742F79E61F32699B969666DCC6BD07C27A52D9CA9B42FCBDE956C5469439299AD1C24AAD4552AECB64773F0EFC2109BAB1B7DA36ED1BB8CF4F5FAD7D27F0A3E19C7E24BAD9344A23919636CF036F7FCFF00C838AF15F85568D7BAAC4C8154E7F4AFB53F663F0BC1AADE470B2856C7CA718E48C93D79200E3F1AF270F173AA91E862AD4E9399F167ED65FB304DE169E692385BECB71931B039DBD7E53EFD2AE7FC13F3C68B26A17DE1CBE711DF411042847FAD54CE303BE54FFE383D6BF403E3FF00C09B6F19F851AC7CBCC7367636DCE1B9C1FA66BE08BAFD9D2FED7E282AE9F7C7C3BE24D3D8BD95E6DFDCC854E42C9DCA9F51923D0D7D3D1ADEE7B0ACEDD99F375E8FB5B6268EAD6FE68F6AF891E1A81D9A368F7336514EEDB9C8EC09FAF0719CF41DFC5B5DF080B6B890C2981900FF00717D7E9D2BAFF14FC6CBAD1251A6F8FF004B9FC31AE28DBE6B0DD637DFED452A82B8EF83C038F7AAB1EAB0EB2BE6DBDC5BDD46DC065903EE18F638F5E9FD6BCFAF46A5397BCBFC8EFC2D684A3A3399D06D9EDAE0099049B4E467185E3A8AF4DF0D5F98A2555DA0E06011EBFF00EAAE22FB4768E7551F2EE008E47DDEA07F2AD0F0D44D6974CC2465DDB4BF3D8703F2C9FCEB99C8E9946E7B5786EE96EC46A7E5651CF55FC3B57A6781F4D86F82ABB34649CF18F97E5C93FD2BC7BC1AF2C122EEC83D82F4E6BB9BDF8A7A6F82747FB46AB730D8B2AEC0A4E64971D362756FC3A71CE3A6F4AEE5648E4C42514DCB63B0F8CFE398FE12FC37B8D4A19337D3016D610EDF9A6B86185200EBB7963F403BD72FF0B7C00DF0CBC096F67707CCD52E98DDEA1213B99E67EC4F7DA303EA09EF5CEFC3E96FBE35F8D6DFC61AC42D068FA6E5743B290E773779DBDF2011EE06321727D16FA469836D39EBC9AEAC5D4565423F3F5FF8079987A7793AF2DBA7F99F307ED8DA98D4FC57A759EEDAB6F1990F3C02C467F402A97C3CD23EDB64A90C6AB25D22AB63F8179639FC081F854BE3AD026F8A1F18AF70CB1DADB385791B958D7231F5278C0EF835ED1F0A3E0D43A7EAF043E4BF931AAC92C8E3AA7503F1FEA6BA65251A71A68F3E9A7ED658996CB6F53D03E0E78323F07782E31B364D79899CE390BFC03F2E7FE055D218B71EB56245CEEE00C9FC0546462A544E09CDC9F34B72309CFCA377AD14188B31C5155C8CCB9D1F3EF877FB6BC2B05F6B1A1EA13C1FD9C15A636F22A1D85C2AB3464E594F1D15802541C122BD23C1BFB625D6913B59F89AC1669217D867B42A24FF0081267693FEE91F4AE9BC5DF0CB45F12F8A758D366D1C69FAC6B1334F6D2E1DDAC884C87F978F2DDF39182793E80579F7C41F819A958788343D1F4F68BC40D1C4F164C5E5E188123465F3BB605200CF2092060915E1D0C446A454A9BF2D7BAF23D28E3B0D5AEA7BEBE4F4FCCF7FF067C4CD1FC716BB74BBE82E1A10C1ECDF31C909EE2488E1860F183C75EB5D3DA6A4DE72EE6DA55787638893B61547F36C7D4D7C4BF16FC390785BE2AEBD1D9EA57D6B258CCF35B5C5DCAC6699826EFF0058A33BDCE4A938EA0120938DFF0007FED6FE30F87EB6ABAC5B9D7B4FB85DD0C9382B2BA290ADB25030FB4F0490DC8EB5D5EDD03C1A92BD3773EA2F8B7F06FC2DF1CF405D37C4163FDA66DF2D0CD13F97716CC7A959170173E878381C1C57C95F1EBE1FDB7C2FF3B45D3E6B992C2C2530C2F2CA1D9E3C0232400091BBAE057BDFC38FDAC7C1BF101121FB72E9376C722DAFC88D189EFBB3E5B7E3C9AF2BFDB3ACE4D435B69239236495526326E1B4E17EF67BE4F61EBDEAE53525741858CE13E595EC7C8BAD5CFDB56533623653EBD0D717AAE959E7EF762C075EB5DA78A216B2BE9376D1B890EA3D8F1F877AE50EA58D46489959BE6C2205EA48ED5CD249EE7D2D29D968729716F92C33C74E2A9BD92C8B8FBD5D36A9A5AC5F7559739F94FF000D64CD6C14679C671D6B1775B1E8D3B35728C568929EA38EF593E24B04B67E9B770C75ADCD4AFE3B7B52AB8565F4AE3B5AD426D45F6F2DCE3934E2DB3492EC2DA49187F97B75AE9B4294F9CA3A293F9D57F08F83BCD897775233D3BD6B69DA63596AC88C3EE9CF35CD5A49EC74528B4B53D47E1023457EB91F2E4004D7DB9FB2B5EAB78AAD49DA15ADDA35CFA9C0FF00EBFD01AF91BE0E685E7DC0DC557E5C851DCF7AFA43E12EBB2784B54B3B95CEE8F05378FBBCE3F956784A8A15A327B5C31B45D4A1282DDA3EA6F18366CA391591941C7D2BE79F8D7E02B7BDD496F2DE38DAF21CBE57838ED9FAE0FE55F4768C96DE29F0ADB4BF7BED09BCFCC72AC7A839AF3FF1CF8724B7BB68DA1CAE4853D88AF7B1D4DFC6B667CB64F563AD17BA3E77F13F882D3C4DE1A6B2D5A38AEA1C6D749D44919E4750DDFE9EB5F3FEB9F023C3B3DC33DB588B1959BAD9CEF09FC87CBEBD075AF69FDA0FC393785EE25B885596DD98A3AF4DB9E86BCCAD35592E255C7CDD3A9EDFE4579D1C6558E91958F6FEA14A6AED189A6FC159BECACD6BE22F115BAC7C956B812607D0819AE8F4FF00811AC0DA0F8BB524F300196B68CE7271D7774208E7D4915BFE19B86BABB8E3C2B311F2AF67F6FF001F6AF47F0FE930DDB34727CC570A78E83FCF1DBB7515D11C7D56B5B7DC8E6965F46FA5FEF6709A47ECE57D730A0BAF19788641FC51C4446147D727F9574FE16FD9C3C37A149F68B88AEB54B8FE17BD9FCC5CFBA8001F5E722BBEB5B15B7B568C7CACA980718CFD7D7F2ACD82F5CB82BFBC52DB4B67A1CF357F5DAED5AFA7968612C1504EF6BFAEBF99BDA7CC60B755DC1B600A1BA7418E828D5AFDADECA72BFDC20907BE3FFAFF00A5672EA4CB32A8F99472734FD4127974CD91C6D3CA57042F7CF53F87F4A9A11BCB5397195128DB6313E1E7C27B7D3F4A8F548D9FCED482DD4C25391B8F208FC188FA57AC7875A1D374E3237FAC988270B9F9470BF871FAD72DA0D9DD5DE871B4C1A1B1B389559F1B9542E17B7A1E2BAAD2BC551F82F4B36F7D6FA6DE5C5E1F36CA57808C8C7C84FCBB42F0015CFBF1DFBE9CA32A8EE7CCE3B30A31A6A9D377B6F62E0D4E373C35396FA32371C7E350DDDD4DE27BCB45D621B3D1D6FAD44B1CD61147F73A86072704F208383D2BB3F869F0EB4FD4345BA8AE92692786F0AF9CD95674182B807A06079EFEFD2BB6346E7994F14A6F96C72125CC470772B06E47228AF618BC31A4E9E1A38ECAC5067243C60E7F3A2B654D2D0DB9FC8E4B5DB8B8F88567771D8B7F62DDC572F6B1DC347F3CAAA70407C6406E47193C567E97E007D1B5026EEF5BCE9AF6599EE96709304F2B24FF00BAAC58704F0DC8E78E1745F8DDE1EF0CDF4CF7168D2DC34C67595EEFCC955F681CB30C91C1FA03C0E0543E26F8F9FF00092DA4D1DAE996B3AB83FBC4BB2EE80F5E005233DFB63DABE2E7F5894F9E514DFADBFAFEB5328E12B3BE9AFADB42E7C44F02E9FE27BFBE1A4D98D60DAC5F66D42EAE1F7BCCAC3E55562C09DA4820AE792383C5719A8FECBF6D73A978774787571A7EA10C12DC5D4528FB4B4899C090404AE0160A0F3D393829CC1AAFC448F58B3B6826D3ED6DCDBAAA79D6E5A29640B8DA5C8382463AE3BD59D77E235A78A6E23BAB9B5B96D52DE111437FF6866B8808390C841500F5C8C739FCDCB0F5793F7568B35A386C65195E0F4ED7BA3C665FD9FB5697519ADDA38E35B3BB6B79645995422804E586491B8B02B8C93861FC39A7AD84BA5F87AF74DB8BE86F0593951857FDD8E87861C67DB8AF56F88BF13D757BA9AE21B1B5B1599BCE97CA45569DF182EE540DCDEF5E1F7DE2A5D5355D482B7FC7D060083D18107FA1AEF8C7951F474EA549DBDA1E57E36741A8CA55BE5CED381D067FA715CA89163BE9256E5770C617208E39C7B575DE36E2E061546D249C0C6ECD7216CCAF77FF003CD5195C7A1E4641FAD07B14FE128EACD35A5C4ADE67991E490AC3BF53C8ED58D7D77E5C38FA1E0D6A6BB3C91CB2AB6597042647DD07B573734AD78992DF2E3D31594CF469199ABCED2C87EF2AF4FC6A7F027850F8ABC44D071B6185A663F4C01F9922A3BBF98FCDD3FA549E12F1549E12D73ED2373433218650BF7B6120F1F4201A889B4AF6D0EDAC0AE9776D0305FDD9DA703B55596756D4F77FB79FCEA9EABF117468FE7B6F32F2563923263C7D770FE42B1EC7E2579D73FBED3556163D6397730FC081FCEB1FAB49B36FAD451F467C29D7E1F22155FF005CDC13D3A76FC6BD5BC3BE2713DEC6B1EEFBDCE7D7D2BE63F0278923902CD6370248F23700D868CFA115E9DE17F19BC3249379AB1AE3736E71B47BD612C3C93365888D8FB2BE197C56FF00844B4C5DE0B2311904E3071D7F2FE58E95E89A478E747F889A7AACD7061990900EE033E8707F0E2BF3A3E20FED5D369482DF4F82F3505E8EF1308E3F7C13D4FB818F7AEBFE047ED531F885D6DA74B88AE22FF9653A8C81EAA4706BBE9E2ABD3872B5789E4D6CBA85597B48BE597747D49F1BBC036BA9E97710CCD1C90CCA627703AA91907F0C74AF90F58F084FE18D5A6B5995B75B9E1BFBEB9E0D7D51A778B078DB478E1FDE49BC82707951FE7B5723E3FF00867FDB96FE72EE69A105B76CCB321EBD7AE0F6F439F5ACF93995ED63A69C9D3F764EE791F845CA4AAB2423E40307D3FF00AD5E9BE1BBEB7307CB1C7E701C7FB5D3BFE02B134FF0449A3932797E641BC63F120700F23D7F97A575373E19681639A0488792C4B050577E7DC74FA7BD118DB726724CB379A932AC45A1DDBCEF46270C3231FE359F73ABE6758D976C8CA64C63A8CF5ABC6147D8AB236633BB041E3DB27AD4534BF6DFF6648891823E6ADA273C9896A59EEBE6C6DC018F6FFF005D749E1FD36E2FAF218EDD49691BB1C360024EDF7EF8C8CE38AE7F4B566037EDCF7C77AD6FB5B6977B6CC91CB710E562BB843843202C0E11F04A9C63E61CF51D09AF4F031D6ECF93CF6B28D3E47D4EBF41D26EAFF41D434DB536B7B269F33DC5D453334126C0BCC5B0E4E54A93C77EBDAB0FC43ADDAEBF671B4AD34D0D8C46DADADD4ABB17CE76F1FC2324827E9E82B67C23F67B7F1868E74BD0752D3753BB8CDBA5FC975E64733807CE90039058AE31D3EF6707835ADE333AA786BE1CDC4363A0FDB6249DDA4D44B2878499141047DE6CF4E3A641ED5D7195355F952776B7B69A1F251C0FEE655E2F6B27FA1DB7C35BFB33E11B59740B64B8B1B75026D3A46DD35939E58233727272707AF623A5759A478934BBA690C73476F73310F2C3336C994F41B949C8E9FCABC4F43F88DA87C39F1069DA6EBF1DBF87E1B22925E8B68806BC047CA5C86218F5CE39233C1C0A6F8EB53B6D53C453F89ACDA69B4C91828BD01BCC8643950A40CFCB90402C303A76AEE96971FD6396375BF63DC3569164B90BBF6B2AF3CF5A2BCB349F8DB68BA3DAB6AAF76D78C9FBC65883296048C7CB8EC01E40EB457C962E58B956938C34BE8612C545BB9F317C44F2EEB5A8556085559031288149E48EA2A4F0D5BDBD9B2C8F0FEF01E184B2291F8EEAABAE4FE6CD0BB7F0E53A763823FAD55FED1F287CB9F97915DB347DBA8E87657F756F709BBE656EED9CE7EB8FE755218634469FCD568579001E5BDBDAB9F8F5A21C3751575F570F679DDB768C9E6B3B761F2B39BF1D6AF773C332C72247953B5541CE7B739F5AF2DD2B58684CB29F9B0E5DB3CFD6BA6F1B78A5629A46DC36AF39CD71DE1AD6A0D52E1AE0AAFF00A548CA5463D3AE3DFAD69CBA171D195FC4171F6F8D64F97E6FCAB8F49D567687710AE0ED23F87BD6FEA45B4DD4EE6C646DCCA7721C7DE04035CF6A5F25E472283F2370074158BDCF5A94AF1B99D788F7F2AAEF25957E663DEB2F56B2FB0031FF001633C74C56C5AC918D4BCB6FBB92DC9C939E7F2AC4F13DE666964932181C0C76153285D1D54EA24F5312718CF5C7BD529E2F9BDB1C53EEF53F2A3538F958E3047CC6AAFDB7CD9BE5DDF2F4E386A8F66D6E743AF16AC8A7305F37A8E99A9236D8157BB1ED55AF2D5A62595B953F3715AFA0E86D7B2C6CAAFD015E3A66AF623734BC37E1D9A4B8596DE49124538DC8C54E3EB5E87A3E9F73ABA2C4F24D2C8BD371C927E9563C23E009B49B185EE1595A4E00276E32A4F3F9568F82E1FB2EB71EE2036E048048DDEC0FE558C8BE569686F7843E1DDF5FFD9E1B6B35BABBBA3B56267E9CF24E7B0FE75ED1F0BBF658D2EDF578EE7525B8DEA72405DA18E79E4741F5A6E89A4C5A55DD8DECD14DE67C842AB9CAABE3E66F7249E7A8AEC34DF1BA26AF27EF17CB4558C07909191923E80F418CE723B62B6E4D0E7F6CFA9E83A6E8F0F874451DBC4B0C0BF2818FBA4F3CF7CFBFF4AD192EA3B7BE11C9B72A7EE9CFC99EA31EE3D3D2B8C8BC502FF4F68E46F344832C981C003F0FC303F8876A93FE121598A6D9198120FCC183103FD9EBCFE3D6A65A1B45F323ADD5341B6BBB3936FDD604A8C12002307B66B95F221B51240EAACF19EA72B8F4E873F9E0D74DA3EBA26D355599C9EBC6430FAD63F892DA346668F6AEE18C053B89F63FE3FA5632B0E37326FDA1BBDBB59BCC1F7883C0F4E2ABC96CC92B31931E63FCB81D462A3BD530DC47F32ABF20E7A11C63F5CD5AB953108CE14AC63BF5CD542ED9135A6A5BD06C56E752B7B653B44D205CF5DBB8819FC3AE2BD67C3BF0CF4CD1A5D52FF50FED266D2D52F2164DD1EEDA49729B7D70B8EE33F5C79D7C1B68F50F1D42DE6461A3DD2C6AE7FD611C607F8FAE2BDD35EF121D3747FB643F7795C671B1BD0FEB5F5581C3FEEB999F079C54E7AFCA677C3E93C356F05FDF7873526BAB9481A692DAF5F732305CFF0010DCBCFDEDBC703DABC575FD7F541A5430F886E3507D26EAE5E79BECCA56459B9E3683F3672BF330E0823B73D7F83AE64F1AFC459248E0B54926732DD3A42B923BE49CF5E9EF9AEF7E237C0BD0FE2C5BFF00A70BAB7BC55212EADE760E9F553956FC467DEBA3D936B98F1EA42EB964CF04B5D66D6DFC5F1EA51DC59EAF36363BF88BE5DD91B3E62CC43001B23A11B7A76A659F893C3DA27856F2CF50D62D6E2FAD63B88AD3EC4CC639096017780B874CE5B2C7A76F4E77E38FECBFE26F853E75F08BFB6B450462F2DA324C43A7EF53929F5E57DF3C579CDB786F5ABE5CC3A4EAD32C884663B395C7E8B587B377647D520DDEECF5CD07E3D59E8760905C497CFB47020765453FC58F98753EA38E9D0515E4BA8F8675BB758C368DAC2B60E7FD0A51FF00B2D150B06BCFEF652C25336FC4C7C9B366C37CA43F3F5E7F9D6525CAB63FBDDEB6BC471E6C180F71EB9E2B8FB1D44B853DC8EA7AD7907D7C5E86A1BA3F66DBCE57F9561EA5E23992268C33286E2B4D66F359BD76E6B96D7E5F2DDFD73D2972EB728E27E20EAEE6CA65CFCD26107E240AC3D01FEC714650EDDAC1B22A4F1EDD6E091F1B9A41FA0350E99F342BF862A9A0353E2D37F67DFDADF2B2AFCA118FBF41FA573B7570B731060DF856DFC6C8FCEF0E346739DA71EDC7F3AF34F00F8C5759B36825907DAA003CC53D48E7071EF8A99536D5D1D987A897B8CDCB9936DCAC8075E09AC3F13BB24FC30C7504F5FA56D5CC9E6AB1538EF587E25B63776EAD9DB27438A231D0EA7231A7D674F44F2EEA68A1C1EAE78156FF00B1D6F6CD64B6782656191246C1971EC4715912787D6772D22E4B1EF59779A25F786A46B8D32E26B5DFF7D54FCAFF00553C7E95528A7A1508BBDCEA63B18ED82AC8186DF45E0D6C786BC536FA45FC2C2360AAE096AF3DB3F19EB33498B86B59BB65E32A7F435A56DAA5DCA54BD8AB29E4189BA7E758CA827D4F4A8B7D8FAFFC3DE24D07E22F80E148674B7BEB1E3CA23E5914F7C7B018FF00F5E2B12C7C14B6FAB4774B8F26D640583375C1E31F957CF3E17F10DF69FA87EEE3BBB5C8F9B1C823F0AEE23F1C5F5C48BFB9D40F97F7F319DBD88FF3EF58BA127A1D5ECACF43EE1F0BEA1E1FF885E1BB3B5B79ADE3BC551B833027200E9DBBF43C0C74ACCD7BE1F5FF0087EDDA56F264F9B7AC8D219028CF7EC71DB1D09E95F2EF842E7C491CDE7E9761AD2B290418A266515EC9E09F89DF1166D2E382F341B99ADA589A4492ED44636838EA73DC11F81F4AD234E76D8F3711878C754CDBD47C4537879095B86679A40ECC24DCD8C0E9CE40CE393D863DAAEE93F1286A12B248DB51C9D85E3C7CC7D4823DFB7BF02B81F157877E2178B1FCCB2D1F4CD2ED718DD2C84B107FD95C7A77AE5DBC29E31D1AF7FD3618E665058B41215C839CE0669CA9F73953945E87D31A3789DE2F2D6447F98ED501F3D7A122B63549A1BDB6914BFDE1838EA2BC23E1E6A3A84B74ABA82CD0490F2CA4E4B0FC3F0E3AF7AF4E6F1009F6B3489B768249E3231DAB9251B3B1DD095D5D92DFCAD26B5E5F5FDDA9DC067B9A6EB5ABED4DB9DD5963578BED371346CCE6639CE7A0EC2BCFBE3A7C545F05F86DA2824C6A1783644B9E6353D5BF2E95D384A2E73491C58EC4469D37266378F3F6839BC25F1374DD4348B8764F0FCC18AA1C09FB48BEF95C8AFABBC55FB44E9F73E035B8B7937C5AF5B25C4231C82402187E86BF3275CF11492DC3367963935EDDF05FC5737887E125964DD48DA5C8D6BCA931801B2A339E30ACBD057D5CBF7705147C47F16AF348FBA7F670F1869969E189A65CCDA8DD49BA455C6540E8093D0739FA9AF50B4D6EEAFD18865B5E09C20DCC31EA4FF402BE78FD94343B8BF87CF9999BD0FA71FF00D6FC315EC1E3993FE11EF0D5C496D204B9C0542A7903E9F8D74D1FE1DCE4A91F7AC4D7BE32C78B63B32D2303CAB3B13C7AE6BA4F11EA7FD8BA72CDF3367001079271C57CC3E20F89DA8C7AC2EE75CAAAE494078156F45FDA23C41AD78862B1F356EA1CED3BD476FC3B525357B07B367D0DA55CDE6AB6FE7319A356FBA03628AE793C5B25B59C2B35F470F1B80217BF5A2B6E5F322CCF94756904968DF9F02B82693CBB99979F924207BF7FEB5DCC8DBA331FD4570FACC42DB599506EC361B3FA7F4AF8EB58FA845EB49732B0FF0060815CE78AD76337E35B7A6B6FBC8D719E0FE3C563F8CD0AEEFA13C5345291E4BE367F3358863FEEE4FD3381FD0D4DA3A92BC1FBD803DFB555F108F3BC42DFECA8EBF89FEB5A1A2C3FBE8D41FE25C71EF55228BDF15223268EFDF68CD7C8FAAF8BAE7C11F1124B8819B6AA857427875E4107F2AFB0BE22DBF9BA5C87BEDCD7C57F18ADFEC9E3CBC5E01C0238EC79FEB5D5858A69A673E22A385A513DD7C35E2D87C4BA343756EE19641CE0F20F706AFCFE5CB01DFCFA7B57CF1F0D3E2049E0FD50AC859ED2E0859541FBB938DC3DC67F2AF7DD26FE2BFB51B195D59036F072AC2B3AD4791F91E861715ED6377B83D92CD1E54EEDBC8C0A89AC5664DA46E18E69EDA9AD848AAC7E5CE3EB4E9AE91A4DC9F74F7AE767A519185A9F829666F32DF0ADFDC638CD3F43CE993859959403D08AD6376DB7B023D7A1A72DF799FEB238A45EA33DAA256EA7761EAB8F43B1F0FEB5A766DF72C7C2B2127BE718AF59F04788B47BAB2BF69161125C2B050D83B4F2AB8CF3D147FDF55F39C77EB1B7CB630B7391890A9FE55B9A4789DA21FF001ECCBB880312EE351CCE3B1D91C545BBD8FB3FE16FC758FC21A4C9651A45B76B22F42189561923FE05FE715B56DE2D9358BDFB45C18561CE406196C93938E3A75EBD3278AF943C1FE3A9A0DBE5AB4655BA939E9DEBD3BC3DE2DBE9A1E7E6DC0609ED513C44ED639EB469CE5CD147B445E225BF493FDA6C3EEFD0FF009F4ACBF105E46903318F7330CEE049C11DC0EDF862B99D3B537164D22AB75C73CFE555350D71B72AFEF1773640249C67F90AE5F697337148E82C2DF2EF24D8DBCFDD6F9463B81FA5654BA9C88ECAB26E6DC729B3181EC7F2ABF697A2CF49F324FDE3E085C90377B74FE75896713EAFAB35ADB47BA694832499DC107A9FFEB56B18E9739EA54E888FC5DE3687C15E17BED4AE01682C62323E3B9EDFAE2BE5FF00117C43BCF88512EA57526E92E65638EC833C281EC2BE98FDA5FC271E93FB3EF8A829DDB2CFCC2D8FBE41539FCFD2BE45F0FF00CBE12B519F9C65BA74AFA0CA611D5F53E633A9BBA899FADEA1B6E36FBE2BE82FD8CADD3C47F0E3C4D6A7E69AD6549907965B1B947008E99D87F1AF9B75AB8CDE3B7F75B8AFA4BFE0991766F3E216BD63E65C422E6CE3C344372E7730F987A73D6BD4AD1BAD4F123269DD1F767ECDFA61D13C136B3155E631B837F103DEAD7C50F17AC7130DF8C295E0E30693C0174DA1FC3587732EF8D76138EA47D7FAD7917C4EF1834F34CFBB6AB12393D39F4AD1D450A6919A85E57398F1CF897370CCADFBC638383C9ABFF08AEE1D3F546B999B2D08E9EA7AD79DDC6A86FF005066FEE9C75EB5D67C3AD1EE35ED56386366DB23006B8E9C9B91D5529A8C4F4CB9B8D53C6F70D25BB4890C270A377AFF00FAA8AF6EF87BE07B6F0C787218E4DAB248A19B299C9A2BBBD8DCE1F6C9687C9376444FCF46F4AE37C6405BEA9149DD908E3B77FF001AEC17FD33438645C96C0AE3FC74BB12DE4DBD24C7E86BE55C4FA252BE843A1CDBB55857AE495E7BF06AAF8DE2F958F4CD3BC3BF36B36A0E7A9273DFE535378D20CA37AB718A23B9A1E2FA8C7E6F882E7FDF1F96056B687066EA1E38DC0D53BAB70755B8C7FCF461CF619C56BE816FBAFE1FF7BAFA553DCA8BD0D1F17C0D71A7328FE55F177ED1BA69B0F88ACDDA6B7471F9B0FE95F71F892CFCDB19307923F2AF8FFF006B7D3843E2BB097072D03AE4F7C30FFE2ABAB07AC8E5C67C173C7D23DC4FE63EB5ED1F0BBC4ABFD9EA199A48D9463FD9FA578B81B39DA31D2BB2F861AD7D9EE1A027EE9DCB9F4ADF1507C970CB6AA55395F53DAB56B55BA855C7CCBB72BC55088E5767CCDB7827A559F0D5F974F2A420C7272B9FE13DFF009558D4F4C6B690301F2B74F7AF3396EAE7D153D34666AC8CA7AFBE2AC5B46D70BB8739F4A6BD910DFDDEF53594C6D9D7A63BD73548BB9DD4E4AC69787F443A85F797F3066F5EE2BBED13E1235D2292C781918E9FE78AE63C3976D6E63B8C2ED590A824E30473FD47E75EA1E1AF18236E924249C85C639C9ED8E9DEB96A4A4B637872BD897C31F0D5B49B90AE3E523193CE3E86BB7D17C35B95A10C55B239604601F7A4D1FC411DC7932636AEE2BB587DF1DEBAA4BCB5855705570429239FA7E9587348BD82C6CBFB3AD56266E5401B98609E94E9349066F30CCA5B824820123D00A1F5D8EE2551B9A3653946C0C67EBD3B77AA736A5F6EBA58E36F9B1B4B000B01C703D33FD2B48AEE612916A446D558C36A172A007623A7F9F415E83E06F0647E14D0DA478E317530E49219C023EEE71C74C923E9EF589E0BD1A1D3D56693E6938214F2ABEF818C9EBC9F5AE865D58CAFC9CC6A7E6E7AD74295F45B11ECECAEF73CABF6DAD5D742FD9CBC45BB6ABDE2476C808FBECF201D3E84FF00DF35F1CD8AFD8B4386361F763C9C57B57EDFFF0012D7C43E2AD17C256B26E4B3FF008985E00D901882B1A9FA02C7FE042BC36FB51F22DDA3E76E0E2BEA72FA7CB4F99F53E2F36ACA75B9574399D5A51F6D6FAFAD7D35FF0004BCD3D24F88FE20BC91AE214B5B2842CF1923CA6676FBDC1182148E7FC6BE5AB99FCEB93F5278FAD7DB7FF04CAF0FFF00617C2BF136BD244DB752B936F1BA91C889718C7A6E73CF3F4E2BAEA6C7967BF697F1246ABE1BFB0C72336339900C679E3FFD5D2B80F897A8DBDAD8B2EE52FD31BBBD5EF12ECF0BD880BF2B04001FC2BCB3C47ADCBAE5EB2B3375EB9AE5A9534B1D3469DDDC7E8D1B5C3EE3D7A0C0EF5F52FECAFF000AD61B35BFB84E9871C74E4E6BC23E0CF825BC4DE23B68447E6431B02DC75AFB4F48D397C19E1186D61C2C930C600FD6B6C252BFBC658AA977CA876AB7BF6EBF936BB2AC4760FF003FA7E145721E28F14269D751C3CB6D1938A2BD0F6A96870AA5A1F35787E1DFA1CB1FFCF39A441ED8622B90F88D0B25AAE3B4A3FC2BBBF0EDB189B508CE3F7776FD7DC29FEB5CAFC59B5F22D777DDF9D7F98AF93944FA0A73D75399F0ABB4BE21B75E9C9E33FEC9AD8F165A99602D8F600F7ACBF04A6EF14DB7A00E71FF000135D66ADA6B5CC3FC58C54C63A9A4AA58F079E02BABDD1C0C2CCE3FF1E35B1E1AB62DA8C591CF5A8AE6C71AC5E2B7459E41F931ADAF0B5A13AAA9DBF754F6EB4496A69756B9AFAB5979B68C38CE3D2BE4FF00DB3F40656D32E547CB1C924449FF0068023FF41AFB227B032C3C75C7A57837ED5BF0FA5D7FC2F3C30AAB4DB1A58C1072CC843607B9008FC6B7C3E9239F10D38D91F173C66275C8AB1A7DFB69F7B15C2F58CFE63D29F796DCAB7B67D702A00B9EBF2D7A92869A9E7C64E2EE8F6AF04EBA9A9D946CADF78715D959DDF988B1CDF3C39E194FCC87DBDBDBDEBC1BE1E7891B48BD10B93B58F1ED5EC3A0EAAB3C20FDE5AF12B5374E563EB3098855A9F99D05C690D348A6D59278FF00E5A639C71FA11C553D474D68ADD5A36556DC3763D2AC5B48D1CA248D995BD54E0D5B875291632AE2091707EF2E3AE7D3EB4A328753492A8B62AE9693433721986327D9B8CE3B76FD0574BA47886E6195776EF9700907E9C9FA67B566D87892349FC992D5595C64146FBBEA391C7FFAAAE2DFC7713232F98A63C8C9030338E9EB5128D37BB0552ADB4477BA7F8A0DCC2A5F057A8C1C119E315D0C1E246FB398E1924F336FCACE7A91C64FD38F7AF3FF000D69979A9C9B3CB665DD8F3376D5C7F3CFD01AF40D13408B4AB6FDF4AB23F0A42A96CFE04E3DB9E3DAB92A7B38AF74EAA6AA497BC6C2EB326A2BF2EE58D88DF267391EBB78CFA13FCEBA0F0D05D35B853963CBBF53FE7DAB9D8AF9127FDC71BBFE5A1E5B1F5AD2B5B8302E77166C13CB6062B9B9AE76463CAB53BEB0D6CECDAB9F4F989E7FC2B07E307C65B1F851E0ABCD4AF2753E4A7EEE30DF34F2740A075EBF90AE57C53F15EC7C11A449757770AAB12E4E5BF90AF947E28FC55D43E39789DAEAE19A3D1ECE42B6F16700FF00B5D7AF15E865F839559EBB1E6E6398428D37DCA727886F3C5BAFDFEBFA94866BED4E5696427B67A01EC0700566EBBAAE22F2D47DE39A9A4BD5F2F0380BD3DBD6B9DD4351FB76A0DB7EEE7038AFAD8C545591F0F29393E664DA7C6D7378AB1AB48EE42AA0196627A003DCD7E9CFC28F0547F05FE02E83E1DDD2477D0C0A6E95B8DF216F324603FBBB988EBDC57C87FF0004F5FD9FAE7E28FC5B875CB8B70FA47865D6E1F783B6E2E0731A0E304A9C391EC3D6BEB9F8EFADDC2CB0DD5B1DB15AE54293D49C64FD381F81AC2B30846EEC73DF12756696DCEEFE1CE08ED5E6D01696E73DFB56C6A7E3D1ACE9CCB27FAD1C7E34EF85BE1893C55E25B78C2B32B4819801FC20FF008D70EB29D8F4BF874CFA63F637F8742DF4B5BEB84F570DB795FF00F5D7A978AFC4088D2CC7FD5C79541E98EB53786F4A5F03F80A3811556599428C77383CFE59FF0038AF3FF88DAFF970F92AD80A0E79EB5ED41284343C7F8A5738FF0013F88E4BCD499B77AE28AE5356D4FCCBA3F3E31C70D8A2B1E634B13E91A5E358D510AAB7FA51247A7EEE3AE33E35D9F91A685DBB58B0209FF780AF49D0A20FAEEB0C403B6EDC7BF0147F4AE0FF00681411C2157A288CF3FEF66BC7A91563AA9C9F324715F0EEDFCDF1547C7CAB13B7F21FD6BD29748FB443EBB7AFAE6B84F84F079DE2776FEEDBB11FF7D257B1E91A4A9B44DDC96E6B3A71D4DAB4B4B9F326ABA6795E20D41476B997FF004335ADE12B222E98EDE83BD4DE25B358BC53AAFF00B37B37FE866B4BC276AAAAC7DF153CB766DCDEEA36AD6D37850579635C67C6EF0CAA5859CCD0C6DBA6D9F3E3BA93DF8ED5E8360998B77A1A6FC62D0BEDBE01865560AC93A11F5C30FEB5D14E1B9CF5A5AA3F35FE38FC3E3E06F1D5E5BAC7B6DAE0FDA2DB18E11BAAFE0C1863D315C3B4383F28039AFAFBF6A2F005BF8A3E1B4BA89D91DE68EAD70AFB7EF28FBEBF8F1D7B815F28DC5A2ABFFB35E8517CD13925A333444CAE197EF2F20D77DE05F1632C71A3370075CD7251DBA9C8ABBA65B9B5618E9F5F435862A8A944EEC0621C27A1EB9A7F88958AF7E3F2AD6B6D5E290763BB1DEBCE34CB86F295958E08CF35A306B525AB2FBF5AF127491F4F1AFA6A8F48B7B886461FBB53EF8ADAD02F61B7B81FBA8D8F3D57B5797E9FE26937F435B361E249A46183F376AE695167446B2E87B668DAEAC457EBD00E95A716B6B3363776EFC5795683AA4D201E63FE439AEB74CB958CAB7EF1989EAC73584A9599D11A973BEB19CBAAAB3F0DD36F53F8F6AC4F88DF156CFC11A63B798A5B0785FE2FA9239AC3F1578E5BC3BA6C8E159982718E8323FF00AF5F3EF897C4D79F1375D9A4B99592DA23CC63AB7B57760703ED257679B98660A8C74DC9FC61E3BD47E2DEB8CF348D1E9F1B60007AFF008D5733AC712C110DB1C63A7BFAFE950CB76B0C3E4C49B1636E3DE9A1B643B893D78F635F55468C69C79627C756AD2A92E6910EB17EB6A8578DC4E33D6A6F86FE07D43E2478C74FD174D8965BDD4A75822DDF7549382CC7B2A8E49EC0562DF49F69BC1DBDABEE3FF82737C21B3F873E007F88979E5DE5E6A28F142883E6B7B70CA1979E37330C9F60067AD54E5657323DDFE1678034DF801F0D74BF09E9EAB1EA118FF499D40DD348D82F2B63BB7F0FD00ED58BF1B64D9A4618AFA7F9FD2B7FE145E4BE35BAD4359BCDBE648FF28033B171C2807A015C87ED137CD6DE646A5B660103D3B1AE3A8FDDB9BD15EFD8F1D483CEBBEBB42B127DEBE8AFD8CBE1E8D475737B246DF29CAAE31903A7E7CD7CFBA3DBFDB6ED54363CC3DEBEE8FD9C3C351785BC01E77DE654C903BF00FF005A9C242F2B9AE32568D8E8BC7FAEADBC8C8BC476E985F9BAB1FF000AF0EF1CEBC67959B77DEC9C77AEDBE22EBAF2459C37EF14E416E3A8FF001AF1DF166A9E6AB2E1BE6539AEEAD2E870C1140B9BB919BF98A2A2D22E044B26ECF2474A2B9E32B2363FFFD9, 'SUPER_ADMIN', '1', null, '-', null, '2020-08-14 20:34:05', '2020-08-30 08:29:17', 'on', 'on', 'on', 'on', null, null, 'on');
