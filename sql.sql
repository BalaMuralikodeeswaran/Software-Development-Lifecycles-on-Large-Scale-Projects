
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency_code` varchar(3) NOT NULL,
  `exchange_rate` decimal(10,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `currency` (`id`, `currency_code`, `exchange_rate`) VALUES
(1, 'GBP', 1.00000),
(2, 'USD', 1.35000),
(3, 'EUR', 1.17000),
(4, 'BRL', 0.21000),
(5, 'JPY', 148.55000),
(6, 'TRY', 12.05000);

CREATE TABLE `InvestmentTypes` (
  `InvestmentType` varchar(50) DEFAULT NULL,
  `MaxInvestmentPerYear` varchar(20) DEFAULT NULL,
  `MinMonthlyInvestment` varchar(20) DEFAULT NULL,
  `MinInitialInvestmentLumpSum` varchar(20) DEFAULT NULL,
  `PredictedReturns` varchar(50) DEFAULT NULL,
  `EstimatedTax` varchar(100) DEFAULT NULL,
  `RBSXGroupFeesPerMonth` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `InvestmentTypes` (`InvestmentType`, `MaxInvestmentPerYear`, `MinMonthlyInvestment`, `MinInitialInvestmentLumpSum`, `PredictedReturns`, `EstimatedTax`, `RBSXGroupFeesPerMonth`) VALUES
('Basic Savings Plan', '£20,000', '£50', 'N/A', '1.2% to 2.4%', '0%', '0.25%'),
('Savings Plan Plus', '£30,000', '£50', '£300', '3% to 5.5%', '10% on profits above £12,000', '0.3%'),
('Managed Stock Investments', 'Unlimited', '£150', '£1,000', '4% to 23%', '10% on profits above £12,000, 20% on profits above £40,000', '1.3%');

CREATE TABLE `investment_plans` (
  `id` int(11) NOT NULL,
  `plan_key` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `max_investment_per_year` varchar(50) NOT NULL,
  `min_monthly_investment` int(11) NOT NULL,
  `min_initial_investment` int(11) NOT NULL,
  `min_predicted_returns` decimal(10,2) NOT NULL,
  `max_predicted_returns` decimal(10,2) NOT NULL,
  `estimated_tax` varchar(50) NOT NULL,
  `fees_per_month` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `investment_plans` (`id`, `plan_key`, `name`, `max_investment_per_year`, `min_monthly_investment`, `min_initial_investment`, `min_predicted_returns`, `max_predicted_returns`, `estimated_tax`, `fees_per_month`) VALUES
(1, 'basic', 'Basic Savings Plan', '20000', 50, 0, 1.20, 2.40, '0', 0.25),
(2, 'plus', 'Savings Plan Plus', '30000', 50, 300, 3.00, 5.50, '10', 0.30),
(3, 'managed', 'Managed Stock Investments', 'Unlimited', 150, 1000, 4.00, 23.00, '10-20', 1.30);

CREATE TABLE `transaction` (
  `id` int(255) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(200) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp()
) ;

INSERT INTO `transaction` (`id`, `userid`, `amount`, `currency`, `transaction_date`) VALUES
(1, 2, 1000.00, 'USD', '2024-01-28 02:30:54'),
(2, 2, 400.00, 'USD', '2024-01-28 02:33:40'),
(3, 2, 400.00, 'USD', '2024-01-30 05:03:31'),
(4, 2, 400.00, 'TRY', '2024-01-31 06:04:13'),
(5, 2, 400.00, 'USD', '2024-01-31 07:01:56');

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `role` varchar(200) NOT NULL,
  `profession` varchar(30) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `checkbox` varchar(191) NOT NULL,
  `holder` varchar(255) DEFAULT NULL,
  `cardnumber` varchar(16) DEFAULT NULL,
  `valid` varchar(5) DEFAULT NULL,
  `cvv` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`Id`, `Username`, `role`, `profession`, `Email`, `Age`, `Password`, `checkbox`, `holder`, `cardnumber`, `valid`, `cvv`) VALUES
(1, 'bula', 'admin', 'Graphic Designer', 'bula@gmail.com', 19, 'bula', 'I agree to it', '', '', '', ''),
(2, 'ammu', 'user', 'Nurse', 'ammu@gmail.com', 20, 'ammu', 'I agree to it', 'ammu', '1625389467163523', '12/29', '700'),
(10, 'bala', 'staff', 'Admin', 'bala@gmail.com', 25, 'bala', 'I agree to it', NULL, NULL, NULL, NULL);

ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `investment_plans`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `investment_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

