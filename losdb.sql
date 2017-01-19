CREATE DATABASE  IF NOT EXISTS `losdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `losdb`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: losdb
-- ------------------------------------------------------
-- Server version	5.7.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','PRI','ID',1,0,1,1,0,1,''),(2,1,'author_id','text','Author',1,0,1,1,0,1,''),(3,1,'title','text','Title',1,1,1,1,1,1,''),(4,1,'excerpt','text_area','excerpt',1,0,1,1,1,1,''),(5,1,'body','rich_text_box','Body',1,0,1,1,1,1,''),(6,1,'image','image','Post Image',0,1,1,1,1,1,'{\n\"resize\": {\n\"width\": \"1000\",\n\"height\": \"null\"\n},\n\"quality\": \"70%\",\n\"upsize\": true,\n\"thumbnails\": [\n{\n\"name\": \"medium\",\n\"scale\": \"50%\"\n},\n{\n\"name\": \"small\",\n\"scale\": \"25%\"\n},\n{\n\"name\": \"cropped\",\n\"crop\": {\n\"width\": \"300\",\n\"height\": \"250\"\n}\n}\n]\n}'),(7,1,'slug','text','slug',1,0,1,1,1,1,''),(8,1,'meta_description','text_area','meta_description',1,0,1,1,1,1,''),(9,1,'meta_keywords','text_area','meta_keywords',1,0,1,1,1,1,''),(10,1,'status','select_dropdown','status',1,1,1,1,1,1,'{\n\"default\": \"DRAFT\",\n\"options\": {\n\"PUBLISHED\": \"published\",\n\"DRAFT\": \"draft\",\n\"PENDING\": \"pending\"\n}\n}'),(11,1,'created_at','timestamp','created_at',0,1,1,1,0,1,''),(12,1,'updated_at','timestamp','updated_at',0,0,1,1,0,1,''),(13,2,'id','PRI','id',1,0,0,0,0,0,''),(14,2,'author_id','text','author_id',1,0,0,0,0,0,''),(15,2,'title','text','title',1,1,1,1,1,1,''),(16,2,'excerpt','text_area','excerpt',1,0,1,1,1,1,''),(17,2,'body','rich_text_box','body',1,0,1,1,1,1,''),(18,2,'slug','text','slug',1,0,1,1,1,1,''),(19,2,'meta_description','text','meta_description',1,0,1,1,1,1,''),(20,2,'meta_keywords','text','meta_keywords',1,0,1,1,1,1,''),(21,2,'status','select_dropdown','status',1,1,1,1,1,1,'{\n\"default\": \"INACTIVE\",\n\"options\": {\n\"INACTIVE\": \"INACTIVE\",\n\"ACTIVE\": \"ACTIVE\"\n}\n}'),(22,2,'created_at','timestamp','created_at',1,1,1,1,0,1,''),(23,2,'updated_at','timestamp','updated_at',1,0,0,0,0,0,''),(24,2,'image','image','image',0,1,1,1,1,1,''),(25,3,'id','PRI','id',1,0,0,0,0,0,''),(26,3,'name','text','name',1,1,1,1,1,1,''),(27,3,'email','text','email',1,1,1,1,1,1,''),(28,3,'password','password','password',1,0,0,1,1,0,''),(29,3,'remember_token','text','remember_token',0,0,0,0,0,0,''),(30,3,'created_at','timestamp','created_at',0,1,1,1,0,1,''),(31,3,'updated_at','timestamp','updated_at',0,0,0,0,0,0,''),(32,3,'avatar','image','avatar',0,1,1,1,1,1,''),(33,5,'id','PRI','id',1,0,0,0,0,0,''),(34,5,'name','text','name',1,1,1,1,1,1,''),(35,5,'created_at','timestamp','created_at',0,0,0,1,0,1,''),(36,5,'updated_at','timestamp','updated_at',0,0,0,0,0,0,''),(37,4,'id','PRI','id',1,0,0,0,0,0,''),(38,4,'parent_id','text','parent_id',0,0,1,1,1,1,''),(39,4,'order','text','order',1,1,1,1,1,1,''),(40,4,'name','text','name',1,1,1,1,1,1,''),(41,4,'slug','text','slug',1,1,1,1,1,1,''),(42,4,'created_at','timestamp','created_at',0,0,1,0,0,1,''),(43,4,'updated_at','timestamp','updated_at',0,0,0,0,0,0,''),(44,6,'id','PRI','id',1,0,0,0,0,0,''),(45,6,'name','text','Name',1,1,1,1,1,1,''),(46,6,'created_at','timestamp','created_at',0,0,0,0,0,0,''),(47,6,'updated_at','timestamp','updated_at',0,0,0,0,0,0,''),(48,6,'display_name','text','Display Name',1,1,1,1,1,1,''),(49,1,'seo_title','text','seo_title',0,1,1,1,1,1,''),(50,1,'featured','checkbox','featured',1,1,1,1,1,1,''),(51,3,'role_id','text','role_id',1,0,0,1,1,0,''),(52,7,'id','PRI','Id',1,0,0,0,0,0,''),(53,7,'title','text','Title',1,1,1,1,1,1,''),(54,7,'image','image','Image',1,1,1,1,1,1,''),(55,7,'created_at','timestamp','Created At',0,1,1,1,0,1,''),(56,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,''),(57,8,'id','PRI','Id',1,0,0,0,0,0,''),(58,8,'name','text','Name',1,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required\"\r\n    }\r\n}'),(59,8,'email','text','Email',1,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required|unique:users\"\r\n    }\r\n}'),(60,8,'password','password','Password',1,0,0,1,1,1,''),(61,8,'remember_token','text','Remember Token',0,0,0,0,0,1,''),(62,8,'created_at','timestamp','Created At',0,0,1,0,0,0,''),(63,8,'updated_at','timestamp','Updated At',0,0,0,0,0,0,''),(64,8,'avatar','image','Avatar',0,1,1,1,1,1,''),(65,8,'role_id','select_dropdown','Role',0,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required\"\r\n    },\r\n    \"relationship\": {\r\n        \"key\": \"id\",\r\n        \"label\": \"display_name\"\r\n    }\r\n}'),(66,8,'company_name','text','Company Name',0,1,1,1,1,1,''),(67,8,'country','text','Country',0,1,1,1,1,1,''),(68,8,'city','text','City',0,1,1,1,1,1,''),(69,8,'telephone','text','Telephone',0,1,1,1,1,1,''),(70,8,'mobile','text','Mobile',0,1,1,1,1,1,''),(71,9,'id','PRI','Id',1,0,0,0,0,0,''),(72,9,'title','text','Title',1,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required|unique:projects\"\r\n    }\r\n}'),(73,9,'description','rich_text_box','Description',1,0,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required\"\r\n    }\r\n}'),(74,9,'country','text','Country',0,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required\"\r\n    }\r\n}'),(75,9,'city','text','City',0,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required\"\r\n    }\r\n}'),(76,9,'address','text','Address',0,0,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required\"\r\n    }\r\n}'),(77,9,'plot_number','text','Plot Number',0,0,1,1,1,1,''),(78,9,'industry','select_dropdown','Industry',0,1,1,1,1,1,'{\r\n    \"options\": {\r\n        \"Buildings\": \"Buildings\",\r\n        \"Industrial\": \"Industrial\",\r\n        \"Infrastructure\": \"Infrastructure\",\r\n        \"Oil and Gas\": \"Oil and Gas\",\r\n        \"Power and Water\": \"Power and Water\"\r\n    }\r\n}'),(79,9,'status','select_dropdown','Status',0,1,1,1,1,1,'{\r\n    \"options\": {\r\n        \"Concept Stage\": \"Concept Stage\",\r\n        \"Feasibility Study\": \"Feasibility Study\",\r\n        \"Tender for Consultancy\": \"Tender for Consultancy\",\r\n        \"Design\": \"Design\",\r\n        \"Tender for Construction\": \"Tender for Construction\",\r\n        \"Construction\": \"Construction\",\r\n        \"On Hold\": \"On Hold\",\r\n        \"Completed\": \"Completed\",\r\n        \"Cancelled\": \"Cancelled\"\r\n    }\r\n}'),(80,9,'type','text','Type',0,1,1,1,1,1,''),(81,9,'client','rich_text_box','Client',0,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required\"\r\n    }\r\n}'),(82,9,'consultant','rich_text_box','Consultant',0,0,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required\"\r\n    }\r\n}'),(83,9,'main_contractor','rich_text_box','Main Contractor',0,0,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required\"\r\n    }\r\n}'),(84,9,'main_contractor_awarded_date','text','Main Contractor Awarded Date',0,0,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"date\"\r\n    },\r\n    \"dateformat\": \"d-M-Y\"\r\n}'),(85,9,'mep_contractor','rich_text_box','Mep Contractor',0,0,1,1,1,1,''),(86,9,'mep_contractor_awarded_date','text','Mep Contractor Awarded Date',0,0,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"date\"\r\n    },\r\n    \"dateformat\": \"d-M-Y\"\r\n}'),(87,9,'construction_start_date','text','Construction Start Date',0,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"date\"\r\n    },\r\n    \"dateformat\": \"d-M-Y\"\r\n}'),(88,9,'construction_end_date','text','Construction End Date',0,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"date\"\r\n    },\r\n    \"dateformat\": \"d-M-Y\"\r\n}'),(89,9,'value','text','Value',0,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"numeric\"\r\n    }\r\n}'),(90,9,'num_of_floors','text','Num Of Floors',0,0,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"numeric\"\r\n    }\r\n}'),(91,9,'num_of_rooms','text','Num Of Rooms',0,0,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"numeric\"\r\n    }\r\n}'),(92,9,'map_latitude','text','Map Latitude',0,0,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"numeric\"\r\n    }\r\n}'),(93,9,'map_longitude','text','Map Longitude',0,0,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"numeric\"\r\n    }\r\n}'),(94,9,'created_at','timestamp','Created At',0,0,1,0,0,1,''),(95,9,'updated_at','timestamp','Updated At',0,0,0,0,0,0,''),(96,10,'id','PRI','Id',1,0,0,0,0,0,''),(97,10,'project_id','select_dropdown','Project',1,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required\"\r\n    },\r\n    \"relationship\": {\r\n        \"key\": \"id\",\r\n        \"label\": \"title\"\r\n    }\r\n}'),(98,10,'date','text','Date',1,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required|date\"\r\n    },\r\n    \"dateformat\": \"d-M-Y\"\r\n}'),(99,10,'description','rich_text_box','Description',1,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required\"\r\n    }\r\n}'),(100,10,'image1','image','Image1',1,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"required|image|max:1000\"\r\n    }\r\n}'),(101,10,'image2','image','Image2',0,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"image|max:1000\"\r\n    }\r\n}'),(102,10,'image3','image','Image3',0,1,1,1,1,1,'{\r\n    \"validation\": {\r\n        \"rule\": \"image|max:1000\"\r\n    }\r\n}'),(103,10,'created_at','timestamp','Created At',0,1,1,0,0,1,''),(104,10,'updated_at','timestamp','Updated At',0,0,0,0,0,0,''),(105,8,'company_owner','checkbox','Company Owner',0,0,1,0,0,0,''),(106,8,'activated','checkbox','Activated',0,1,1,1,1,1,''),(107,8,'not_activated_reason','text','Not Activated Reason',0,1,1,1,1,1,''),(109,8,'last_login_at','timestamp','Last Login At',0,0,0,0,0,0,''),(108,9,'image','image','Image',0,1,1,1,1,1,''),(110,8,'stripe_id','text','Stripe Id',0,0,0,0,0,0,''),(111,8,'card_brand','text','Card Brand',0,0,0,0,0,0,''),(112,8,'card_last_four','text','Card Last Four',0,0,1,0,0,0,''),(113,8,'trial_ends_at','timestamp','Trial Ends At',0,0,0,0,0,0,'');
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','',1,0,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(2,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page','',1,0,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(8,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','',1,0,'2017-01-04 02:40:02','2017-01-04 02:53:54'),(4,'categories','categories','Category','Categories','voyager-categories','TCG\\Voyager\\Models\\Category','',1,0,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(5,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu','',1,0,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(6,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role','',1,0,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(9,'projects','projects','Project','Projects','voyager-company','App\\Project','',1,0,'2017-01-05 05:47:40','2017-01-05 06:21:13'),(10,'updates','updates','Update','Updates','voyager-list-add','App\\Update','',1,0,'2017-01-06 02:51:03','2017-01-06 02:52:26');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favouriteprojects`
--

DROP TABLE IF EXISTS `favouriteprojects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favouriteprojects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favouriteprojects`
--

LOCK TABLES `favouriteprojects` WRITE;
/*!40000 ALTER TABLE `favouriteprojects` DISABLE KEYS */;
INSERT INTO `favouriteprojects` VALUES (10,4,2);
/*!40000 ALTER TABLE `favouriteprojects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','/admin','_self','voyager-boat',NULL,NULL,1,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(2,1,'Media','/admin/media','_self','voyager-images',NULL,NULL,5,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(3,1,'Posts','/admin/posts','_self','voyager-news',NULL,NULL,6,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(4,1,'Users','/admin/users','_self','voyager-person',NULL,NULL,3,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(5,1,'Categories','/admin/categories','_self','voyager-categories',NULL,NULL,8,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(6,1,'Pages','/admin/pages','_self','voyager-file-text',NULL,NULL,7,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(7,1,'Roles','/admin/roles','_self','voyager-lock',NULL,NULL,2,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(8,1,'Tools','','_self','voyager-tools',NULL,NULL,9,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(9,1,'Menu Builder','/admin/menus','_self','voyager-list',NULL,8,10,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(10,1,'Database','/admin/database','_self','voyager-data',NULL,8,11,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(11,1,'Settings','/admin/settings','_self','voyager-settings',NULL,NULL,12,'2017-01-04 01:46:06','2017-01-04 01:46:06'),(13,1,'Projects','/admin/projects','_self','voyager-company','#000000',NULL,13,'2017-01-05 06:22:13','2017-01-05 06:22:13'),(14,1,'Updates','/admin/updates','_self','voyager-list-add','#ff0000',NULL,14,'2017-01-06 02:59:38','2017-01-06 02:59:38');
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2017-01-04 01:46:06','2017-01-04 01:46:06');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_000000_add_user_avatar',1),(4,'2016_01_01_000000_create_data_types_table',1),(5,'2016_01_01_000000_create_pages_table',1),(6,'2016_01_01_000000_create_posts_table',1),(7,'2016_02_15_204651_create_categories_table',1),(8,'2016_05_19_173453_create_menu_table',1),(9,'2016_10_21_190000_create_roles_table',1),(10,'2016_10_21_190000_create_settings_table',1),(11,'2016_10_30_000000_set_user_avatar_nullable',1),(12,'2016_11_30_131710_add_user_role',1),(13,'2016_11_30_135954_create_permission_table',1),(14,'2016_11_30_141208_create_permission_role_table',1),(15,'2016_12_26_201236_data_types__add__server_side',1),(16,'2017_01_12_060323_migration_for_cashier',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin','admin','2017-01-04 01:46:06','2017-01-04 01:46:06'),(2,'browse_database','admin','2017-01-04 01:46:06','2017-01-04 01:46:06'),(3,'browse_media','admin','2017-01-04 01:46:06','2017-01-04 01:46:06'),(4,'browse_settings','admin','2017-01-04 01:46:06','2017-01-04 01:46:06'),(5,'browse_menus','menus','2017-01-04 01:46:06','2017-01-04 01:46:06'),(6,'read_menus','menus','2017-01-04 01:46:06','2017-01-04 01:46:06'),(7,'edit_menus','menus','2017-01-04 01:46:06','2017-01-04 01:46:06'),(8,'add_menus','menus','2017-01-04 01:46:06','2017-01-04 01:46:06'),(9,'delete_menus','menus','2017-01-04 01:46:06','2017-01-04 01:46:06'),(10,'browse_pages','pages','2017-01-04 01:46:06','2017-01-04 01:46:06'),(11,'read_pages','pages','2017-01-04 01:46:06','2017-01-04 01:46:06'),(12,'edit_pages','pages','2017-01-04 01:46:07','2017-01-04 01:46:07'),(13,'add_pages','pages','2017-01-04 01:46:07','2017-01-04 01:46:07'),(14,'delete_pages','pages','2017-01-04 01:46:07','2017-01-04 01:46:07'),(15,'browse_roles','roles','2017-01-04 01:46:07','2017-01-04 01:46:07'),(16,'read_roles','roles','2017-01-04 01:46:07','2017-01-04 01:46:07'),(17,'edit_roles','roles','2017-01-04 01:46:07','2017-01-04 01:46:07'),(18,'add_roles','roles','2017-01-04 01:46:07','2017-01-04 01:46:07'),(19,'delete_roles','roles','2017-01-04 01:46:07','2017-01-04 01:46:07'),(44,'delete_users','users','2017-01-04 02:40:02','2017-01-04 02:40:02'),(43,'add_users','users','2017-01-04 02:40:02','2017-01-04 02:40:02'),(42,'edit_users','users','2017-01-04 02:40:02','2017-01-04 02:40:02'),(41,'read_users','users','2017-01-04 02:40:02','2017-01-04 02:40:02'),(40,'browse_users','users','2017-01-04 02:40:02','2017-01-04 02:40:02'),(25,'browse_posts','posts','2017-01-04 01:46:07','2017-01-04 01:46:07'),(26,'read_posts','posts','2017-01-04 01:46:07','2017-01-04 01:46:07'),(27,'edit_posts','posts','2017-01-04 01:46:07','2017-01-04 01:46:07'),(28,'add_posts','posts','2017-01-04 01:46:07','2017-01-04 01:46:07'),(29,'delete_posts','posts','2017-01-04 01:46:07','2017-01-04 01:46:07'),(30,'browse_categories','categories','2017-01-04 01:46:07','2017-01-04 01:46:07'),(31,'read_categories','categories','2017-01-04 01:46:07','2017-01-04 01:46:07'),(32,'edit_categories','categories','2017-01-04 01:46:07','2017-01-04 01:46:07'),(33,'add_categories','categories','2017-01-04 01:46:07','2017-01-04 01:46:07'),(34,'delete_categories','categories','2017-01-04 01:46:07','2017-01-04 01:46:07'),(49,'delete_projects','projects','2017-01-05 05:47:40','2017-01-05 05:47:40'),(48,'add_projects','projects','2017-01-05 05:47:40','2017-01-05 05:47:40'),(47,'edit_projects','projects','2017-01-05 05:47:40','2017-01-05 05:47:40'),(46,'read_projects','projects','2017-01-05 05:47:40','2017-01-05 05:47:40'),(45,'browse_projects','projects','2017-01-05 05:47:40','2017-01-05 05:47:40'),(50,'browse_updates','updates','2017-01-06 02:51:03','2017-01-06 02:51:03'),(51,'read_updates','updates','2017-01-06 02:51:03','2017-01-06 02:51:03'),(52,'edit_updates','updates','2017-01-06 02:51:03','2017-01-06 02:51:03'),(53,'add_updates','updates','2017-01-06 02:51:03','2017-01-06 02:51:03'),(54,'delete_updates','updates','2017-01-06 02:51:03','2017-01-06 02:51:03');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projectnotes`
--

DROP TABLE IF EXISTS `projectnotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projectnotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `shared_with_team` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projectnotes`
--

LOCK TABLES `projectnotes` WRITE;
/*!40000 ALTER TABLE `projectnotes` DISABLE KEYS */;
INSERT INTO `projectnotes` VALUES (17,4,2,'sdf',1);
/*!40000 ALTER TABLE `projectnotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plot_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consultant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_contractor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `main_contractor_awarded_date` datetime DEFAULT NULL,
  `mep_contractor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mep_contractor_awarded_date` datetime DEFAULT NULL,
  `construction_start_date` datetime DEFAULT NULL,
  `construction_end_date` datetime DEFAULT NULL,
  `value` decimal(40,2) DEFAULT NULL,
  `num_of_floors` smallint(6) DEFAULT NULL,
  `num_of_rooms` smallint(6) DEFAULT NULL,
  `map_latitude` double DEFAULT NULL,
  `map_longitude` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Test Project','projects/January2017/YGU1NYrinYaxT5uSoULT.png','<p>Test Project</p>','Pakistan','Lahore','Test Address','123','Buildings','Concept Stage','Hotel','<p>Test Client</p>','<p>asdf</p>','<p>asdf</p>','2017-01-25 00:00:00','<p>asdf</p>',NULL,NULL,'2017-01-26 00:00:00',123456.00,4,-45,4,4,'2017-01-06 00:10:18','2017-01-19 00:26:48'),(2,'Test Project 2',NULL,'<p>asdfasdf</p>','Pakistan','Lahore','123456','11233','Buildings','Concept Stage','HOtel','<p>asdf</p>','<p>asdf</p>','<p>asdf</p>','2017-01-16 00:00:00','<p>asdfasdf</p>',NULL,NULL,NULL,0.00,0,0,0,0,'2017-01-19 01:55:45','2017-01-19 01:55:45');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projecttags`
--

DROP TABLE IF EXISTS `projecttags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projecttags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `tag` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projecttags`
--

LOCK TABLES `projecttags` WRITE;
/*!40000 ALTER TABLE `projecttags` DISABLE KEYS */;
INSERT INTO `projecttags` VALUES (9,4,2,'Actioned'),(4,4,1,'Actioned');
/*!40000 ALTER TABLE `projecttags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recentlyviewedprojects`
--

DROP TABLE IF EXISTS `recentlyviewedprojects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recentlyviewedprojects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recentlyviewedprojects`
--

LOCK TABLES `recentlyviewedprojects` WRITE;
/*!40000 ALTER TABLE `recentlyviewedprojects` DISABLE KEYS */;
/*!40000 ALTER TABLE `recentlyviewedprojects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2017-01-04 01:46:06','2017-01-04 01:46:06'),(2,'user','Normal User','2017-01-04 01:46:06','2017-01-04 01:46:06');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (3,4,'default','sub_9uwp4zd6IH0MIs','annually',1,NULL,NULL,'2017-01-12 06:39:42','2017-01-12 07:39:24');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `updates`
--

DROP TABLE IF EXISTS `updates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `updates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `updates`
--

LOCK TABLES `updates` WRITE;
/*!40000 ALTER TABLE `updates` DISABLE KEYS */;
INSERT INTO `updates` VALUES (3,1,'2017-01-10 00:00:00','<p>asdf j</p>','updates/January2017/hnsIszZ08lzi7NyqODIQ.png',NULL,NULL,'2017-01-10 00:48:49','2017-01-19 00:21:39'),(4,1,'2017-01-25 00:00:00','<p>asdf</p>','updates/January2017/f603rl0NA1UvzjW2zoUF.png',NULL,NULL,'2017-01-13 04:10:12','2017-01-13 04:10:12'),(5,1,'2017-01-24 00:00:00','<p>sdfasdf</p>','updates/January2017/6Fvh5wzPaHZsgd1FW1R5.png',NULL,NULL,'2017-01-13 04:32:36','2017-01-13 04:32:36');
/*!40000 ALTER TABLE `updates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'users/default.png',
  `role_id` int(11) DEFAULT '0',
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_owner` tinyint(1) DEFAULT NULL,
  `activated` tinyint(1) DEFAULT NULL,
  `not_activated_reason` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_index` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@admin.com','$2y$10$OYGm9r07lgU6EpYAMV2TKuJBrIHqOb1VB5WhDSJmUwovsNP/4Mo/e','JaLd7BYs4HQW4PHx6z4aRJUyEPswyCFQaiI7xDkoRkyBztOOFYH5cu7pRmGJ','2017-01-04 01:46:42','2017-01-19 03:03:52','users/default.png',1,'','','','','',0,0,'',NULL,NULL,NULL,NULL,NULL),(4,'Inaam','minaammunir@gmail.com','$2y$10$Yya5Aea2E1MR/tRDzbbp7uRogJQZKsCopHHwRM1W8j5.0vlkFRN2K','v9YE3G73Z0UI1mT5OAjL1e7E6bDrCkWVgTJIupii1w2BE2qA89x9CwH7wUPR','2017-01-12 01:56:29','2017-01-19 03:05:23','users/default.png',2,'hashtag','Pakistan','Lahore','123456','123456',1,1,'',NULL,'cus_9uwSrgTORwH0iB','Visa','4242','2017-07-11 01:56:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-19 18:27:09
