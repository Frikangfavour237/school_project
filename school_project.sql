-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 11 mars 2025 à 19:49
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
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date`) VALUES
(1, 14, '2025-03-10 02:23:00'),
(2, 1, '2025-03-11 11:23:14'),
(3, 1, '2025-03-11 11:36:08'),
(4, 1, '2025-03-11 11:39:31'),
(5, 1, '2025-03-11 11:39:42'),
(6, 1, '2025-03-11 12:49:13'),
(7, 1, '2025-03-11 12:51:07'),
(8, 1, '2025-03-11 12:51:10'),
(9, 11, '2025-03-11 12:51:43'),
(10, 14, '2025-03-11 12:52:17'),
(11, 14, '2025-03-11 12:56:04'),
(12, 12, '2025-03-11 12:56:07'),
(13, 15, '2025-03-11 13:07:41'),
(14, 1, '2025-03-11 13:56:13'),
(15, 1, '2025-03-11 14:05:44'),
(16, 15, '2025-03-11 14:23:10');

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
(4, 15, 'approved', '2025-03-11 13:04:22', '2025-03-11 13:04:22');

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
(12, NULL, NULL, NULL, 'skjdj', 2, 1, '2025-02-20 02:37:14', '2025-03-11 10:49:18'),
(13, NULL, NULL, NULL, 'lwmef', 2, 0, '2025-02-20 03:00:27', '2025-03-11 10:47:16'),
(14, NULL, NULL, NULL, 'mr carlson is a bad man', 3, 0, '2025-02-20 09:30:28', '2025-03-11 10:47:12'),
(15, NULL, NULL, NULL, 'Mr carlson is a good teacher', 2, 0, '2025-02-27 09:47:09', '2025-03-11 10:47:01'),
(16, NULL, NULL, NULL, 'isnisndiu', 1, 0, '2025-03-01 14:00:05', '2025-03-11 10:46:49'),
(17, NULL, NULL, NULL, 'jkgjajxa', 0, 0, '2025-03-11 10:47:28', '2025-03-11 10:47:28'),
(18, NULL, NULL, NULL, 'George is a boy', 1, 0, '2025-03-11 10:47:44', '2025-03-11 10:47:49');

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
(1, 13, 1, 'like', '2025-02-20 03:00:29'),
(2, 12, 1, 'dislike', '2025-02-20 03:01:19'),
(3, 14, 1, 'like', '2025-02-20 09:30:39'),
(4, 14, 11, 'like', '2025-02-27 09:47:28'),
(5, 15, 11, 'like', '2025-02-27 09:47:39'),
(6, 16, 4, 'like', '2025-03-11 10:46:49'),
(7, 15, 4, 'like', '2025-03-11 10:47:01'),
(8, 14, 4, 'like', '2025-03-11 10:47:12'),
(9, 13, 4, 'like', '2025-03-11 10:47:16'),
(10, 18, 4, 'like', '2025-03-11 10:47:49'),
(11, 12, 4, 'like', '2025-03-11 10:49:18');

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
(15, 'anabelle', 'ana', '4', 'male', 'ana@gmail.com', '$2y$10$ynyygqsmmcGHVs1PWESWcu3.8nbcaAaLfyo0QL4jiiyZGD3TNGS2m', 'student', '2025-03-11 12:59:09', '2025-03-11 12:59:09');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `attendance_requests`
--
ALTER TABLE `attendance_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `feedback_likes`
--
ALTER TABLE `feedback_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
