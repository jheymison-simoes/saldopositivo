-- Tabela Cadastrar Usuários
CREATE TABLE `bd_saldo_positivo`.`cadastrar_usuarios` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `nome` VARCHAR(300) NOT NULL , 
    `email` VARCHAR(300) NOT NULL , 
    `senha` VARCHAR(255) NOT NULL ,
     PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Tabela Cadastrar_ganhos
CREATE TABLE `bd_saldo_positivo`.`cadastrar_ganhos` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `data` DATE NOT NULL , 
    `descricao` VARCHAR(300) NOT NULL , 
    `tipo_renda` VARCHAR(200) NOT NULL , 
    `valor` DECIMAL(19,2) NOT NULL , 
    `renda_fixa` VARCHAR(200) NOT NULL DEFAULT 'Não' , 
    `id_cadastrar_usuarios` INT NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Tabela Cadastrar_despesas
CREATE TABLE `bd_saldo_positivo`.`cadastrar_despesas` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `data` DATE NOT NULL , 
    `descricao` VARCHAR(300) NOT NULL , 
    `tipo_despesa` VARCHAR(200) NOT NULL , 
    `tipo_pagamento` VARCHAR(200) NOT NULL , 
    `despesa_fixa` VARCHAR(200) NOT NULL DEFAULT 'Não' , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Tabela pagametos_a_vista
CREATE TABLE `bd_saldo_positivo`.`pagamentos_a_vista` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `forma_pagamento` VARCHAR(200) NOT NULL , 
    `valor_despesa` DECIMAL(19,2) NOT NULL , 
    `id_cadastrar_despesas` INT NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Tabela cartoes a vista
CREATE TABLE `bd_saldo_positivo`.`cartoes_avista` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `id_cadastrar_cartoes` INT NOT NULL , 
    `id_cadastrar_despesas` INT NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Tabela Cartoes Parcelados
CREATE TABLE `bd_saldo_positivo`.`cartoes_parcelados` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `id_cadastrar_cartoes` INT NOT NULL , 
    `id_cadastrar_despesas` INT NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Tabela Cartoes Parcelados
CREATE TABLE `bd_saldo_positivo`.`pagamentos_parcelados` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `forma_pagamento` VARCHAR(200) NOT NULL , 
    `qnt_parcelas` INT(10) NOT NULL , 
    `valor_parcela` DECIMAL(19,2) NOT NULL , 
    `id_cadastrar_despesas` INT NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Tabela tipos de despesas
CREATE TABLE `bd_saldo_positivo`.`tipos_de_despesas` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `tipo_despesa` VARCHAR(200) NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- Tabela tipos de ganhos
CREATE TABLE `bd_saldo_positivo`.`tipos_de_ganhos` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `tipo_ganho` VARCHAR(200) NOT NULL , 
    PRIMARY KEY (`id`
)) ENGINE = InnoDB;

-- Tabela de cartoes_cadastrados
CREATE TABLE `bd_saldo_positivo`.`cadastrar_cartoes` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `titulo` VARCHAR(300) NOT NULL , 
    `banco` VARCHAR(300) NOT NULL , 
    `bandeira` VARCHAR(100) NOT NULL , 
    `limite_total` VARCHAR(200) NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;