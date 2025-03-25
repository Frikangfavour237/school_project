-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 mars 2025 à 05:52
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `school_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrators`
--

INSERT INTO `administrators` (`id`, `user_id`, `created_at`, `updated_at`, `fullname`, `email`, `password`) VALUES
(1, NULL, '2025-02-18 08:35:08', '2025-02-18 08:35:08', 'frikang favour', 'fe@gmail.com', '$2y$10$CS7NjyWOJV6/gaq3gSmrB.9dMqYfuRLIKkWHRQzdDbN2skdZKQf0G'),
(2, NULL, '2025-02-18 08:45:02', '2025-02-18 08:45:02', 'frikang', 'fee@gmail.com', '$2y$10$xaloGRhSsIk5Tk.bCCMgFONxzcPuF0CKikaFIBR9DjjR11InAB/5a'),
(3, NULL, '2025-02-26 10:18:12', '2025-02-26 10:18:12', 'marthi', 'lois1@gmail.com', '$2y$10$Ctq8adD0OjwRjdX9CY0yxuc7MxSt0dJ3K/t/ZVP49kKkGoPAVtWJG');

-- --------------------------------------------------------

--
-- Structure de la table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL DEFAULT '\'present\''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date`, `status`) VALUES
(1, 14, '2025-03-10', 'present'),
(2, 1, '2025-03-11', 'present'),
(3, 1, '2025-03-11', 'present'),
(4, 1, '2025-03-11', 'present'),
(5, 1, '2025-03-11', 'present'),
(6, 1, '2025-03-11', 'present'),
(7, 1, '2025-03-11', 'present'),
(8, 1, '2025-03-11', 'present'),
(9, 11, '2025-03-11', 'present'),
(10, 14, '2025-03-11', 'present'),
(11, 14, '2025-03-11', 'present'),
(12, 12, '2025-03-11', 'present'),
(13, 15, '2025-03-11', 'present'),
(14, 1, '2025-03-11', 'present'),
(15, 1, '2025-03-11', 'present'),
(16, 15, '2025-03-11', 'present'),
(17, 15, '2025-03-12', 'present'),
(18, 15, '2025-03-20', 'present'),
(19, 1, '2025-03-20', 'present'),
(20, 12, '2025-03-20', 'present'),
(21, 1, '2025-03-20', 'present'),
(22, 12, '2025-03-20', 'present'),
(26, 11, '2025-03-20', 'present'),
(27, 15, '2025-03-20', 'present'),
(28, 15, '2025-03-20', 'present'),
(29, 1, '2025-03-20', 'present'),
(30, 14, '2025-03-20', 'present'),
(31, 15, '2025-03-20', 'present'),
(32, 15, '2025-03-20', 'present'),
(33, 1, '2025-03-20', 'present'),
(34, 12, '2025-03-20', 'present'),
(35, 12, '2025-03-20', 'present'),
(36, 12, '2025-03-20', 'present'),
(37, 15, '2025-03-20', 'present'),
(38, 15, '2025-03-20', 'present'),
(39, 15, '2025-03-20', 'present'),
(40, 15, '2025-03-20', 'present'),
(41, 15, '2025-03-20', 'present'),
(42, 15, '2025-03-20', 'present'),
(43, 15, '2025-03-20', 'present'),
(44, 13, '2025-03-20', 'present'),
(45, 13, '2025-03-20', 'present'),
(46, 12, '2025-03-20', 'present'),
(47, 12, '2025-03-20', 'present'),
(48, 12, '2025-03-20', 'present'),
(49, 12, '2025-03-20', 'present'),
(50, 12, '2025-03-20', 'present'),
(51, 14, '2025-03-20', 'present'),
(52, 12, '2025-03-20', 'present'),
(53, 13, '2025-03-20', 'present'),
(54, 12, '2025-03-20', 'present'),
(55, 13, '2025-03-20', 'present'),
(56, 12, '2025-03-20', 'present'),
(57, 13, '2025-03-20', 'present'),
(58, 12, '2025-03-20', 'present'),
(59, 12, '2025-03-20', 'present'),
(60, 12, '2025-03-20', 'present'),
(61, 15, '2025-03-25', 'present'),
(62, 15, '2025-03-25', '\'present\''),
(63, 14, '2025-03-25', '\'present\''),
(64, 11, '2025-03-25', '\'present\''),
(65, 12, '2025-03-25', '\'present\''),
(66, 14, '2025-03-25', '\'present\''),
(67, 14, '2025-03-25', '\'present\''),
(68, 12, '2025-03-25', '\'present\'');

-- --------------------------------------------------------

--
-- Structure de la table `attendance_requests`
--

CREATE TABLE `attendance_requests` (
  `request_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `attendance_requests`
--

INSERT INTO `attendance_requests` (`request_id`, `student_id`, `status`, `request_date`, `created_at`) VALUES
(1, 14, 'approved', '2025-03-10 01:52:08', '2025-03-11 13:04:06'),
(2, 12, 'pending', '2025-03-10 15:26:07', '2025-03-11 13:04:06'),
(3, 11, 'pending', '2025-03-10 17:06:27', '2025-03-11 13:04:06'),
(4, 15, 'approved', '2025-03-11 13:04:22', '2025-03-11 13:04:22'),
(5, 12, 'pending', '2025-03-12 12:36:35', '2025-03-12 12:36:35'),
(6, 15, 'approved', '2025-03-25 02:36:18', '2025-03-25 02:36:18'),
(7, 14, 'approved', '2025-03-25 03:12:41', '2025-03-25 03:12:41'),
(8, 12, 'pending', '2025-03-25 03:45:07', '2025-03-25 03:45:07');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `likes` int(11) DEFAULT 0,
  `dislikes` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `feedback`
--

INSERT INTO `feedback` (`id`, `student_id`, `teacher_id`, `course_id`, `comment`, `likes`, `dislikes`, `created_at`, `updated_at`) VALUES
(15, NULL, NULL, NULL, 'Mr carlson is a good teacher', 3, 0, '2025-02-27 09:47:09', '2025-03-25 03:53:15'),
(19, NULL, NULL, NULL, 'I think  when Mr Pada is a good teacher amd he takes time to explain his notes to students', 1, 0, '2025-03-25 03:51:24', '2025-03-25 03:51:28'),
(20, NULL, NULL, NULL, 'I don\'t understand when Mr W teaches. he never answers questions and insults students who try answering his questions. ', 0, 1, '2025-03-25 03:52:32', '2025-03-25 03:52:36');

-- --------------------------------------------------------

--
-- Structure de la table `feedback_likes`
--

CREATE TABLE `feedback_likes` (
  `id` int(11) NOT NULL,
  `feedback_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `action` enum('like','dislike') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `feedback_likes`
--

INSERT INTO `feedback_likes` (`id`, `feedback_id`, `student_id`, `action`, `created_at`) VALUES
(5, 15, 11, 'like', '2025-02-27 09:47:39'),
(7, 15, 4, 'like', '2025-03-11 10:47:01'),
(12, 19, 12, 'like', '2025-03-25 03:51:28'),
(13, 20, 12, 'dislike', '2025-03-25 03:52:36'),
(14, 15, 12, 'like', '2025-03-25 03:53:15');

-- --------------------------------------------------------

--
-- Structure de la table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `stud_id` int(11) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`stud_id`, `Fullname`, `batch`, `gender`, `Email`, `Password`) VALUES
(1, 'matrivyne', '14', 'female', 'not@gmail.com', '$2y$10$3fgpN0TEk2gXkX0/9ZS2tOCxKLSWSj9RTKSmEy0axPZ'),
(2, 'matrivyne', '14', 'female', 'not2@gmail.com', '$2y$10$VNMbD8WLOaKyGau2cWuVe.4jFCpugetBsiSFADLn7/g'),
(3, 'frikang favour a', '3', 'female', 'vy@gmail.com', '$2y$10$Kbt/waR7c9Y.XJsrLmFNBeIXkTfhFKUvbGubjZ0h/Hd'),
(4, 'anabelle', '4', 'male', 'ana@gmail.com', '$2y$10$ynyygqsmmcGHVs1PWESWcu3.8nbcaAaLfyo0QL4jiiy');

-- --------------------------------------------------------

--
-- Structure de la table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `subject`, `created_at`, `updated_at`) VALUES
(1, 'fri', 'DQ', '2025-02-17 11:49:26', '2025-02-17 11:49:26'),
(2, 'feev', 'law', '2025-02-17 11:50:25', '2025-02-17 11:50:25'),
(3, 'martha', 'eng', '2025-02-26 10:10:53', '2025-02-26 10:10:53');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','admin','teacher') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `batch`, `gender`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, NULL, 'vyna', NULL, NULL, 'favour@gmail.com', '$2y$10$MdzFIcFRSriez33YmJDWWeQ29v2zHb.3xpQiRNeIQAS1Dcr6DtKVa', 'student', '2025-02-15 14:06:34', '2025-02-15 14:06:34'),
(2, NULL, 'root', NULL, NULL, 'vyn@gmail.com', '$2y$10$VHir/QvAtneY6WdqxxVRhOdUf.AUNqVEkt.LNJ4uS6WwiR.Fsr3rK', 'teacher', '2025-02-15 14:20:17', '2025-02-15 14:20:17'),
(3, NULL, 'DWD', NULL, NULL, 'EvyoSna@gmail.com', '$2y$10$fm8V0gVrMqkQQEve/yjvz.pzwrcCzhaPlVbeYfJXHUNMkVhKnA.d2', 'teacher', '2025-02-17 11:49:26', '2025-02-17 11:49:26'),
(4, NULL, 'favour', NULL, NULL, 'feev@gmail.com', '$2y$10$Avq8NsEYYQpV98qFUSI4JuMR/CDzWIkuS6734XT3rctXOhxdSvK46', 'teacher', '2025-02-17 11:50:25', '2025-02-17 11:50:25'),
(5, NULL, 'frikang favour', NULL, NULL, 'fe@gmail.com', '$2y$10$CS7NjyWOJV6/gaq3gSmrB.9dMqYfuRLIKkWHRQzdDbN2skdZKQf0G', 'admin', '2025-02-18 08:35:08', '2025-02-18 08:35:08'),
(6, NULL, 'frikang', NULL, NULL, 'fee@gmail.com', '$2y$10$xaloGRhSsIk5Tk.bCCMgFONxzcPuF0CKikaFIBR9DjjR11InAB/5a', 'admin', '2025-02-18 08:45:02', '2025-02-18 08:45:02'),
(7, NULL, 'vyne', NULL, NULL, 'favourfrikang@gamil.com', '$2y$10$SaICzthbh2JSsV7sgf87cukilxUpkrMXkUpWGqetcRXMbXkBlCVE.', 'student', '2025-02-20 02:11:47', '2025-02-20 02:11:47'),
(8, NULL, 'ebenda', NULL, NULL, 'martha@gmail.com', '$2y$10$KW4pHJLfvstep.RDr.oMEu8tlqA/xIZzI4/k/RlG/6GobIwDu7.qq', 'teacher', '2025-02-26 10:10:53', '2025-02-26 10:10:53'),
(9, NULL, 'marthe', NULL, NULL, 'lois@gmail.com', '$2y$10$Sw95jj/r2j1Jp.Y.tqqazO7vRjj28gAFK.GNJm/xiEhi36IKiL98S', 'admin', '2025-02-26 10:17:13', '2025-02-26 10:17:13'),
(10, NULL, 'marthi', NULL, NULL, 'lois1@gmail.com', '$2y$10$Ctq8adD0OjwRjdX9CY0yxuc7MxSt0dJ3K/t/ZVP49kKkGoPAVtWJG', 'admin', '2025-02-26 10:18:12', '2025-02-26 10:18:12'),
(11, NULL, 'marthir', NULL, NULL, 'aih@gmail.com', '$2y$10$KrSWz/87dmAn.vGUTyh77eMTsaF36pk6uP/OZhel9o.qrA3uUsp6q', 'student', '2025-02-26 10:25:50', '2025-02-26 10:25:50'),
(12, 'matrivyne', 'not', '14', 'female', 'not1@gmail.com', '$2y$10$XyJUW2l9hro//1/QPum29OoZtCrbnAR22Pv35xgHq.JlWDP4SsB9S', 'student', '2025-03-01 14:32:03', '2025-03-01 14:32:03'),
(13, 'matrivyne', 'note', '14', 'female', 'not2@gmail.com', '$2y$10$VNMbD8WLOaKyGau2cWuVe.4jFCpugetBsiSFADLn7/g8xFGYX15tq', 'student', '2025-03-01 14:35:34', '2025-03-01 14:35:34'),
(14, 'frikang favour a', 'vy', '3', 'female', 'vy@gmail.com', '$2y$10$Kbt/waR7c9Y.XJsrLmFNBeIXkTfhFKUvbGubjZ0h/HdoAGRGM2uwC', 'student', '2025-03-10 01:51:57', '2025-03-10 01:51:57'),
(15, 'anabelle', 'ana', '4', 'male', 'ana@gmail.com', '$2y$10$ynyygqsmmcGHVs1PWESWcu3.8nbcaAaLfyo0QL4jiiyZGD3TNGS2m', 'student', '2025-03-11 12:59:09', '2025-03-11 12:59:09'),
(16, 'oa', 'kAd', '34', NULL, 'LHlh@gmail.com', '', 'student', '2025-03-25 00:59:05', '2025-03-25 00:59:05'),
(17, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:43', '2025-03-25 01:22:43'),
(18, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:44', '2025-03-25 01:22:44'),
(19, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:46', '2025-03-25 01:22:46'),
(20, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:47', '2025-03-25 01:22:47'),
(21, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:47', '2025-03-25 01:22:47'),
(22, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:48', '2025-03-25 01:22:48'),
(23, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:48', '2025-03-25 01:22:48'),
(24, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:48', '2025-03-25 01:22:48'),
(25, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:49', '2025-03-25 01:22:49'),
(26, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:49', '2025-03-25 01:22:49'),
(27, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:49', '2025-03-25 01:22:49'),
(28, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:53', '2025-03-25 01:22:53'),
(29, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:54', '2025-03-25 01:22:54'),
(30, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:54', '2025-03-25 01:22:54'),
(31, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:54', '2025-03-25 01:22:54'),
(32, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:22:55', '2025-03-25 01:22:55'),
(33, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:26:20', '2025-03-25 01:26:20'),
(34, 'adnJQDK', 'qdf', NULL, NULL, 'IDFI@gmail.com', '', 'teacher', '2025-03-25 01:26:21', '2025-03-25 01:26:21'),
(35, 'dff', 'DWD', NULL, NULL, 'EvyoSna@gmail.com', '', 'teacher', '2025-03-25 01:26:36', '2025-03-25 01:26:36'),
(36, 'dff', 'DWD', NULL, NULL, 'EvyoSna@gmail.com', '', 'teacher', '2025-03-25 01:26:37', '2025-03-25 01:26:37'),
(37, 'dff', 'DWD', NULL, NULL, 'EvyoSna@gmail.com', '', 'teacher', '2025-03-25 01:28:02', '2025-03-25 01:28:02'),
(38, 'dff', 'DWD', NULL, NULL, 'EvyoSna@gmail.com', '', 'teacher', '2025-03-25 01:28:02', '2025-03-25 01:28:02'),
(39, 'dff', 'DWD', NULL, NULL, 'EvyoSna@gmail.com', '', 'teacher', '2025-03-25 01:28:03', '2025-03-25 01:28:03'),
(40, 'ihszka', 'ksa', '43', NULL, 'feig@gmail.com', '', 'student', '2025-03-25 01:29:09', '2025-03-25 01:29:09'),
(41, 'g', 'ksa', '43', NULL, 'feig@gmail.com', '', 'student', '2025-03-25 01:29:19', '2025-03-25 01:29:19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Index pour la table `attendance_requests`
--
ALTER TABLE `attendance_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Index pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Index pour la table `feedback_likes`
--
ALTER TABLE `feedback_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `feedback_id` (`feedback_id`,`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Index pour la table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stud_id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Index pour la table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `attendance_requests`
--
ALTER TABLE `attendance_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `feedback_likes`
--
ALTER TABLE `feedback_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrators`
--
ALTER TABLE `administrators`
  ADD CONSTRAINT `administrators_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `attendance_requests`
--
ALTER TABLE `attendance_requests`
  ADD CONSTRAINT `attendance_requests_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Contraintes pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Contraintes pour la table `feedback_likes`
--
ALTER TABLE `feedback_likes`
  ADD CONSTRAINT `feedback_likes_ibfk_1` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_likes_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `materials_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
