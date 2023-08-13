-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 13 août 2023 à 15:58
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bcreditstage`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `ida` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `idu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id` int(11) NOT NULL,
  `cin` int(11) NOT NULL,
  `date_delivrance` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `date_naissance` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `etat_civil` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `identite_employeur` varchar(255) DEFAULT NULL,
  `adresse_employeur` varchar(255) DEFAULT NULL,
  `numero_compte` int(11) NOT NULL,
  `salaire` int(11) DEFAULT NULL,
  `montant_credit` int(11) DEFAULT NULL,
  `objet_credit` varchar(255) DEFAULT NULL,
  `besoins_courants` varchar(255) NOT NULL,
  `acquisition_vehicule` varchar(255) NOT NULL,
  `amenagement` varchar(255) NOT NULL,
  `attestation_salaire` varchar(255) NOT NULL,
  `copie_cin` varchar(255) NOT NULL,
  `fiche_paie` varchar(255) NOT NULL,
  `devis` varchar(255) NOT NULL,
  `idu` int(11) DEFAULT NULL,
  `idfc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ficheclient`
--

CREATE TABLE `ficheclient` (
  `idfc` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_ouvertureCompte` varchar(255) NOT NULL,
  `agence` varchar(255) NOT NULL,
  `titre_civilite` varchar(255) NOT NULL,
  `nom_pere` varchar(255) NOT NULL,
  `prenom_pere` varchar(255) NOT NULL,
  `type_client` varchar(255) NOT NULL,
  `type_document` varchar(255) NOT NULL,
  `numero_document` int(11) NOT NULL,
  `date_delivrance` varchar(255) NOT NULL,
  `lieu_delevrance` varchar(255) NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `date_naissance` varchar(255) NOT NULL,
  `pays_naissance` varchar(255) NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `autre_nationalite` varchar(255) NOT NULL,
  `etat_civil` varchar(255) NOT NULL,
  `nbr_enfant` int(11) NOT NULL,
  `numero_telephone` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `gouvernerat` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `status_professionnel` varchar(255) NOT NULL,
  `position_professionnel` varchar(255) NOT NULL,
  `fonction_exercee` varchar(255) NOT NULL,
  `activite_professionnel` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `adresse_professionnelle` varchar(255) NOT NULL,
  `fonction_publique` varchar(255) NOT NULL,
  `nature_employeur` varchar(255) NOT NULL,
  `type_compte` varchar(255) NOT NULL,
  `sources_fonds` varchar(255) NOT NULL,
  `source_patirimoine` varchar(255) NOT NULL,
  `revenus_annuels` int(11) NOT NULL,
  `charge_annuelles` int(11) NOT NULL,
  `idu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `idr` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `cin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `idu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `lastname`, `is_verified`) VALUES
(1, 'imtinen@gmail.com', '[]', '$2y$13$R90KcjRW4b7f5.rwVhwSBO4HyUXtuWvIDs1rsGPCcc5VBHrUesEHi', 'imtinen', 0),
(2, 'imtinen.abrougui@esprit.tn', '[]', '$2y$13$kOaLF6TYQ13kLiwtkeFWMuu.eVjbvAAKu/okcL3WJK0q78SLYZAjq', 'abrougui', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`ida`),
  ADD KEY `fk_utilisateur` (`idu`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tulisa` (`idu`),
  ADD KEY `fk_client` (`idfc`);

--
-- Index pour la table `ficheclient`
--
ALTER TABLE `ficheclient`
  ADD PRIMARY KEY (`idfc`),
  ADD KEY `fk_utili` (`idu`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`idr`),
  ADD KEY `fk_ut` (`idu`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ficheclient`
--
ALTER TABLE `ficheclient`
  MODIFY `idfc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `idr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_utilisateur` FOREIGN KEY (`idu`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`idfc`) REFERENCES `ficheclient` (`idfc`),
  ADD CONSTRAINT `fk_tulisa` FOREIGN KEY (`idu`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `ficheclient`
--
ALTER TABLE `ficheclient`
  ADD CONSTRAINT `fk_utili` FOREIGN KEY (`idu`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `fk_ut` FOREIGN KEY (`idu`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
