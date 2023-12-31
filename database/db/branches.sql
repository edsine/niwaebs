/* 
--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_region` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_ecsnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest_rank` int(11) DEFAULT NULL,
  `staff_strength` int(11) DEFAULT NULL,
  `managing_id` int(11) DEFAULT NULL,
  `branch_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
-- */

INSERT INTO `branches` (`id`, `branch_name`, `branch_region`, `branch_code`, `last_ecsnumber`, `highest_rank`, `staff_strength`, `managing_id`, `branch_email`, `branch_phone`, `branch_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HEADQUARTER', '20', '1001', '1345', 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(2, 'LAGOS', '1', '1004', '1327', 1, NULL, 1, 'fct1@nsitf.gov.ng', '08032144152; 08012213324; 07063123413', 'Zone 6', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(3, 'PORT HARCOURT', '1', '1007', '0389', 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(4, 'WARRI', '1', '1005', '1428', 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(5, 'ONITSHA A/O', '18', '1002', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(6, 'YENAGOA', '17', '1003', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(7, 'EKET', '21', '1006', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(8, 'ABEOKUTA', '6', '1101', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(9, 'LOKOJA', '6', '1102', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(10, 'CALABAR', '8', '1103', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(11, 'KADUNA', '32', '1104', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(12, 'JALINGO', '6', '1105', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(13, 'HADEJIA', '2', '1201', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(14, 'MINNA', '2', '1202', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(15, 'SOKOTO', '2', '1203', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(16, 'ABUJA L/O', '9', '1301', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(17, 'MAIDUGURI', '9', '1302', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(18, 'YOLA', '9', '1303', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(19, 'OGUTA', '9', '1304', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (20, 'MAIDUGURI', '9', '1305', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(21, 'IGBOKODA', '9', '1306', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(22, 'ONITSHA R/P', '9', '1307', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(23, 'YALEWA/YAURI', '25', '1401', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(24, 'BARO PORT', '25', '1402', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (25, 'IBADAN', '25', '1403', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (26, 'ABEOKUTA', '25', '1404', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (27, 'AKURE', '25', '1405', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (28, 'LAFIA', '26', '1501', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (29, 'MAKURDI', '26', '1502', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (30, 'JOS', '26', '1503', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (31, 'KATSINA', '13', '1601', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (32, 'KADUNA', '13', '1602', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (33, 'ZARIA', '13', '1603', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (34, 'SOKOTO', '14', '1701', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (35, 'KEBBI', '14', '1702', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (36, 'GUSAU', '14', '1703', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (37, 'DUTSE', '14', '1704', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (38, 'KANO', '14', '1705', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (39, 'IKORODU', '19', '1801', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (40, 'AGEGE', '19', '1802', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (41, 'MAINLAND', '19', '1803', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (42, 'OTA', '19', '1804', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (43, 'IKEJA', '19', '1805', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (44, 'LEKKI', '19', '1806', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (45, 'SATELLITE', '19', '1807', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (46, 'APAPA', '19', '1808', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (47, 'ISLAND', '19', '1809', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (48, 'DAMATURU', '30', '1901', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (49, 'YOLA', '31', '1902', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (50, 'MAIDUGURI', '4', '1903', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (51, 'TRANS-AMADI', '27', '2001', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (52, 'UYO', '27', '2002', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (53, 'ONNE', '27', '2003', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (54, 'PORT HARCOURT', '27', '2004', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (55, 'CALABAR', '5', '2005', NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
-- (56, 'NNEWI', '9', NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL),
(57, 'JAHI', '1', '1008', '0036', 1, 50, 1, 'corporateaffairs@nsitf.gov.ng', '08083132023', 'Plot 1184 Cadastral Zone B08, Jahi District, Abuja', '2023-07-12 15:43:12', '2023-07-12 15:43:12', NULL);

/* --
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_branch_name_unique` (`branch_name`),
  ADD UNIQUE KEY `branches_branch_code_unique` (`branch_code`),
  ADD UNIQUE KEY `branches_last_ecsnumber_unique` (`last_ecsnumber`),
  ADD UNIQUE KEY `branches_branch_email_unique` (`branch_email`),
  ADD UNIQUE KEY `branches_branch_phone_unique` (`branch_phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
  COMMIT; */