-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.6-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para ecommerce
DROP DATABASE IF EXISTS `ecommerce`;
CREATE DATABASE IF NOT EXISTS `ecommerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ecommerce`;

-- Copiando estrutura para tabela ecommerce.carrinho
DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `quantidade_carrinho` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_produto`),
  KEY `FK_carrinho_produto` (`id_produto`),
  CONSTRAINT `FK_carrinho_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  CONSTRAINT `FK_carrinho_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela ecommerce.carrinho: ~0 rows (aproximadamente)
DELETE FROM `carrinho`;
/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrinho` ENABLE KEYS */;

-- Copiando estrutura para tabela ecommerce.compras
DROP TABLE IF EXISTS `compras`;
CREATE TABLE IF NOT EXISTS `compras` (
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_compras_produto` (`id_produto`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `FK_compras_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  CONSTRAINT `FK_compras_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela ecommerce.compras: ~0 rows (aproximadamente)
DELETE FROM `compras`;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Copiando estrutura para tabela ecommerce.produto
DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` longtext DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `preço` double DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela ecommerce.produto: ~10 rows (aproximadamente)
DELETE FROM `produto`;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`id`, `nome`, `descricao`, `imagem`, `categoria`, `preço`, `quantidade`) VALUES
	(1, 'Smart TV LED 43” LG 43LM6300PSB ', ' A Smart TV 43LM6300PSB da LG veio para deixar seu momento de lazer e descontração ainda melhores. Sua resolução Full HD em uma linda tela LED de 43" deixam os filmes e as séries ainda mais incríveis para você assistir com sua família e seus amigos. Ela vem com sistema operacional WebOS 4.5, além de Wi-Fi e Bluetooth, 03 Entradas HDMI, 02 Entradas USB, 01 Entrada RF para TV aberta/TV a Cabo, 01 Entrada AV/vídeo componente, 01 Entrada LAN RJ45, tudo isso para uma melhor imersão no mundo do entretenimento com muitas opção de programação. A função Clear Voice destaca a voz do ruído de fundo, entregando mais claridade sonora. O Virtual Surround Plus entrega mais imersão sonora e máximo envolvimento para todos os seus conteúdos. O Upscaler Full HD permite que você curta todos os seus conteúdos, mesmo os de baixa resolução, com a máxima qualidade do seu TV. Todos os televisores LG já vem com conversor digital integrado, pra você curtir seus conteúdos com altíssima qualidade. Ao captar e combinar imagens em diferentes exposições (maior e menor exposição), o conteúdo em HDR entrega uma qualidade de brilho e contraste superior, com uma riqueza de detalhes nunca vista antes. Com a Inteligência Artificial da LG e seu reconhecimento de voz, você consegue controlar sua TV sem complicações, procurar por qualquer informação ou conteúdo que quiser, basta apenas falar através do controle remoto Smart Magic (vendido separadamente). Essa excelente inovação entrega ainda mais conveniência para seu lazer!', 'tvlg43.jpg', 'TV', 1804, 5),
	(2, 'Smart TV Full HD LED 43” Samsung 43T5300A', 'Curta seus filmes, série e programas favoritos com a máxima qualidade de imagem e som com a Smart TV Samsung 43T5300A. Com uma tela LED de 43" e resolução Full HD, ela oferece uma quantidade muito maior de detalhes, mais nitidez e cores vibrantes que vão surpreender você e todos seus amigos e familiares. A conectividade Wi-Fi Direct e as diversas entradas HDMI, USB e ethernet vão manter você sempre conectado e por dentro de tudo. Além disso, ela também conta com sistema operacional Tizen, processador Hyper Real, HDR e sistema de espelhamento de smartphone para TV.', 'tvsamsung.jpg', 'TV', 1899, 5),
	(3, 'Smart TV 4K LED 60” LG 60UN7310PSA', 'A Smart TV 60UN7310PSA da LG vem com tela LED de 60" e painel VA, o que proporciona um novo jeito de ver TV. Com a Inteligência Artificial da LG e seu reconhecimento de voz, você consegue controlar sua TV com o controle Smart Magic sem complicações. Procurar por qualquer informação ou conteúdo que quiser, basta apenas falar. Essa excelente inovação entrega ainda mais conveniência para seu lazer. A evolução da melhor plataforma Smart do mercado. Mais rápido e muito mais intuitivo, o webOS conta com funções novas e entrega uma melhor experiência para o consumidor. Diretamente do launcher, você terá sugestões de conteúdos, podendo acessá-los diretamente com um só click. Agilizando mais ainda sua navegação. O Ultra HD 4K é o futuro da definição de imagem. Você terá imagens com um nível incrível de detalhes e pode ter uma TV maior mesmo em uma sala pequena. O AI Sound entrega máxima imersão sonora e envolvimento para todos os seus conteúdos. Simulando uma sensação tridimensional de filmes e séries. Seus filmes e jogos terão muito mais qualidade! Ela vem com conectividade Wi-Fi e Bluetooth para que você conecte seu smartphone, teclado ou mouse para digitar e navegar com facilidade ou ainda amplificar suas músicas. Tudo isso aliado á um processador potente. Além disso, você possui as 3 entradas HDMI, 2 USB, 1 RF para TV aberta, 1 Saída Óptica, tudo para que você conecte aparelhos eletrônicos diversos.', '2b0891c36d1de528f176abceecf49de0.jpg', 'TV', 3199, 5),
	(4, 'Suporte de teto para TVs 4K, 3D, PLASMA, SMART, LC', '*PRODUTO ORIGINAL* Você receberá o suporte exatamente igual a foto, com 3 anos de garantia. QS-140 - SUPORTE PARA FIXAÇÃO EM TETO E PAREDE, PARA TELAS ATÉ 47” POLEGADAS Compatível com TVs 4K, 3D, PLASMA, SMART, LCD, LED, OLED, QLED e Diversos Monitores GARANTIA: 1 ANO SUPORTA ATÉ 40 Kg CARACTERISTICAS DO PRODUTO: Fabricado em aço carbono de alta resistência. Acabamento e estrutura reforçada. Pintura eletrostática. Coluna telescópica. Regulagem de inclinação. Giro horizontal em 270° em espaço livre. Cabos de instalação de áudio e vídeo, podem ser passados por dentro do tubo do suporte. Distância máxima do teto: 101cm e distância mínima: 82cm Código do Produto: QS140 Dimensões embalagem individual ( C x A x P ) - 67x9x14,5cm - PESO: 4,200Kg Composição do produto: Aço carbono de alta resistência, estampado, plásticos injetados, parafusos de aço, arruelas de metal, pintura em epóxi (eletrostática). Produto não perecível. Validade indeterminada. Não oferece risco à saúde. Código de defesa do consumidor: Lei 8078/90. Dimensões do produto montado: Distância do teto com haste regulável: Máxima 101cm, Mínima 82cm. VESA Máxima: 60cm largura x 40cm comprimento, VESA Mínima: 5cm largura x 5cm comprimento Conteúdo da embalagem: 1 suporte articulado com 4 movimentos QS-140 e 1 kit de instalação completo. O kit de instalação possui as medidas de parafusos mais comuns do mercado. Caso os parafusos contidos no kit, não sejam os adequados a sua TV, adquira em uma loja de sua confiança. Os parafusos contidos no kit são baseados no padrão VESA universal. Conteúdo do Kit de instalação (incluso): Para fixação na parede: 4 parafusos sextavados soberbo 1⁄4 x 50mm, 4 buchas no 10, 4 arruelas M8 Para fixação na TV: 4 Arruelas espassadoras plásticas 5mm, 4 parafusos phillips ou fenda M4 x 16mm, 4 parafusos phillips ou fenda M5 x 16mm, 4 parafusos phillips ou fenda M6 x 16mm, 4 parafusos phillips ou fenda M8 x 20mm, 4 parafusos phillips ou fenda M8 x 35mm, 4 arruelas M6, 4 arruelas M8 Para telas de 10", 11", 12", 13", 14", 15", 16", 17", 18", 19", 20", 21", 22", 23", 24", 25", 26", 27", 28", 29", 30", 31", 32", 33", 34", 35", 36", 37", 38", 39", 40", 41", 42", 43", 44", 45", 46", 47" polegadas. Compatível com padrão VESA 60x60mm - 100x100mm - 200x100mm - 200x200mm - 200x300mm - 200x400mm - 400X400mm – 600x400mm Norma padrão VESA universal, é a distância entre os 4 pontos de fixação presentes na traseira das TVs podendo variar de acordo com a marca, modelo e tamanho. Consulte o manual da TV.', 'e08aa17bfaae03e0c9ee24a482d2e1cb.jpg', 'Suporte', 148.11000061035156, 5),
	(5, 'Suporte articulado com 3 movimentos para TV-Plasma', '*PRODUTO ORIGINAL* Você receberá o suporte exatamente igual a foto, com 3 anos de garantia. QS 56 CLASSIC - SUPORTE ARTICULADO COM 3 MOVIMENTOS PARA TV E MONITOR TELAS DE 10" A 56" COMPATÍVEL COM TVs 4K, 3D, PLASMA, SMART, LCD, LED, OLED, QLED e Diversos Monitores2 GARANTIA: 3 ANOS SUPORTA ATÉ 40 Kg CARACTERÍSTICAS DO PRODUTO: Movimentos reduzidos para pequenos espaços. Fácil instalação. Já vem pré-montado. 3 Movimentos. 2 articulações horizontais. 1 inclinação vertical. Distância máxima da parede de 20 cm e distância mínima de 9 cm Fabricado em aço carbono de alta resistência. Estrutura inovadora e reforçada. Pintura eletrostática (epóxi) Código do Produto: QS-56 Classic Dimensões da embalagem individual ( C x A x P ) - 28x14,5x6,7cm - PESO: 1,900Kg Composição do produto: Aço carbono de alta resistência, estampado, plásticos injetados, parafusos de aço, arruelas de metal, pintura em epóxi (eletrostática). Produto não perecível. Validade indeterminada. Não oferece risco à saúde. Código de defesa do consumidor: Lei 8078/90. Dimensões do produto montado: Máxima (VESA): 40cm largura x 40cm altura x 20cm profundidade. Mínima (VESA): 5cm largura x 5cm altura x 9cm profundidade Conteúdo da embalagem: 1 suporte articulado com 3 movimentos QS-56 Classic e 1 kit de instalação completo O kit de instalação possui as medidas de parafusos mais comuns do mercado. Caso os parafusos contidos no kit, não sejam os adequados a sua TV, adquira em uma loja de sua confiança. Os parafusos contidos no kit são baseados no padrão VESA universal. Conteúdo do Kit de instalação (incluso): Para fixação na parede: 4 parafusos sextavados, soberbo 1⁄4 x 50mm, 4 buchas no 10, 4 arruelas M8. Para fixação na TV: 4 parafusos phillips ou fenda M4 x 16mm, 4 parafusos phillips ou fenda M5 x 16mm, 4 parafusos phillips ou fenda M6 x 16mm, 4 parafusos phillips ou fenda M8 x 20mm, 4 parafusos phillips ou fenda M8 x 35mm, 4 arruelas M6, 4 arruelas M8. Para telas de 10", 11", 12", 13", 14", 15", 16", 17", 18", 19", 20", 21", 22", 23", 24", 25", 26", 27", 28", 29", 30", 31", 32", 33", 34", 35", 36", 37", 38", 39", 40", 41", 42", 43", 44", 45", 46", 47", 48", 49", 50", 51", 52", 53", 54", 55", 56" polegadas. Compatível com padrão VESA 50x50mm, 75x75mm, 100x75mm, 100x100mm, 200x100mm, 200x200mm, 400x200mm e 400x400mm. Norma padrão VESA universal, é a distância entre os 4 pontos de fixação presentes na traseira das TVs podendo variar de acordo com a marca, modelo e tamanho. Consulte o manual da TV.', '3ec385968d5449afe339f41f1dcc9eb9.jpg', 'Suporte', 74.01000213623047, 5),
	(6, 'Smartphone Samsung Galaxy A10s ', 'O Display Infinito de 6,2" vai redefinir seu entretenimento para que você não perca nenhum detalhe seja jogando seus games ou assistindo seus vídeos favoritos. O smartphone Galaxy A10s é elegante e ao mesmo tempo durável, além de ter acabamento sofisticado e ergonômico. Conta com sensor de impressão digital para maior segurança. Ele é composto por câmera dupla. Tudo com um campo de visão semelhante ao olho humano. Com um telefone tão inteligente como este suas fotos se tornam incríveis. A câmera frontal de 8MP oferece fotos nítidas de alta resolução. E com o Foco da Selfie que desfoca suavemente o fundo seu rosto se torna o destaque. Agora você tem ainda mais maneiras de se expressar. Com uma bateria de 4.000mAh pronta para durar o dia todo você aproveita ao máximo cada momento. E não precisa se preocupar em recarregar este smartphone tem carregamento rápido de 7,5W para que você volte ao que estava fazendo sem perder seu tempo. O processador octa-core trabalha com conteúdos e recursos na ponta dos seus dedos para que você acesse tudo rapidamente. O modo Noturno oferece uma experiência confortável no escuro e os recursos visuais claros e intuitivos fazem com que seu telefone mostre a você uma segunda natureza. Possui ainda um armazenamento interno de 32GB para guardar suas fotos e músicas, mais memória RAM de 2GB. É 4G para não perder nada nas redes sociais e é dual chip para você poder usar com duas operadoras da sua escolha. Nesta versão disponível na cor azul.', '45129e74bbe4c46a88360e2f4a13f08d.jpg', 'Celular', 899.989990234375, 5),
	(7, 'Smartphone Motorola G8 Play', 'Smartphone Motorola G8 Play 32GB Vermelho 4G - 2GB RAM Tela 6,2” Câm. Tripla + Câm. Selfie 8MP\r\n\r\nO Moto G8 Play da Motorola é perfeito para você ampliar a sua diversão, sua tela Max Vision HD+ de 6,2" é ideal para quem deseja ter uma imersão total em filmes e jogos. Registre momentos mágicos e sem perder nenhum detalhe com a câmera traseira tripla de 13MP + 8MP + 2MP. Faça selfies com a galera usando a câmera frontal de 8MP, inclusive você pode usar alguns recursos como o cor em destaque e o modo retrato. Para quem é fã de games e vídeos sabe o quanto é chato quando um Smartphone começa a ficar lento né! Esse produto foi projetado para dizer adeus a esses atrasos, já que o processador Octa-Core oferece uma performance incrível, além de contar com 2GB de memória RAM para manter a performance sem lentidão. Tenha um aparelho que é ideal para salvar fotos e vídeos sem se preocupar com a questão de espaço, pois conta com 32GB de armazenamento interno. Fique sempre conectado nas suas redes sociais com a tecnologia 4G em um aparelho Dual Chip. Não se preocupe com tomadas, já que este produto oferece uma bateria de 4000mAh. E para se sentir mais seguro, este modelo conta com sensor de impressão digital. Ele está disponível na cor Vermelho Magenta, garantindo estilo e sofisticação em suas mãos.', '8bcf04ffebab7fce494ec19cded51f8f.jpg', 'Celular', 1115.0699462890625, 5),
	(8, 'Smartphone LG K8 Plus 16GB Platinum 4G Quad-Core', 'Smartphone LG K8 Plus 16GB Platinum 4G Quad-Core - 1GB RAM 5,45” Câm. 8MP + Câm. Selfie 5MP\r\n\r\nConecte-se com o atual e invista em alta tecnologia com este Smartphone LG K8 Plus 4G dual chip, com ele, você terá a melhor experiência de usabilidade, desempenho e confiabilidade, pois, o K8 foi aprovado em 6 diferentes testes de acordo com o mais altos padrões do departamento de defesa americano. Além disso, ele conta com 16GB de memória interna, mais o suporte ao cartão de memória de até 32GB. Já sua memória RAM é 1GB, que resulta em um ótimo desempenho de resposta do aparelho combinado ao processador Quad-Core. O sistema operacional é o Android GO, uma versão otimizada e mais leve. E ainda há recursos da tela que conta com 5,45" e de resolução HD e IPS LCD. Ah, e o melhor: as câmeras! A traseira tem resolução em 8MP com foco automático, HDR e enquadramento de foto. Já a frontal vem com 5MP, com foto espelhada, temporizador e virtual flash, para registrar sua selfie e eternizar aqueles momentos perfeitos! Nesta versão, este produto está na cor Platinum.', 'd6f29fabc23aed1cd65bb3f47448b758.jpg', 'Celular', 599.010009765625, 5),
	(9, 'Warrior fone de ouvido headset gamer new generatio', 'Warrior fone de ouvido headset gamer new generation - ph158\r\n------------------------------------\r\nDESCRIÇÃO DO PRODUTO\r\n------------------------------------\r\n\r\nO headset é um acessório que faz toda a diferença na hora das batalhas, não é mesmo?\r\n\r\nPensando nisso, a linha Gamer Warrior investiu em qualidade e custo-benefício para trazer os melhores produtos aos amantes de jogos. Confira abaixo e garanta já o seu!\r\n\r\nMultiplataforma, o Headset Gamer Warrior é compatível com os consoles. Utilize-o em todos os momentos e seja sempre um vencedor!\r\n\r\nCom haste ajustável, é possível mexer no tamanho e ângulo de acordo com a preferência do jogador.\r\n\r\nHASTE AJUSTÁVEL 90o\r\n\r\nAjuste de tamanho e de ângulo de acordo com a preferência do jogador.\r\n\r\n------------------------------------\r\nESPECIFICAÇÕES TÉCNICAS\r\n------------------------------------\r\n\r\n-Ean: 7899838809922\r\n\r\n-Tipo De Microfone: Omnidirecional\r\n\r\n-Comprimento Do Cabo (Cm): 100\r\n\r\n-Garantia: 12 Meses\r\n\r\n-Sensibilidade (Db): 102\r\n\r\n-Composição Do Material: Composição Interna (Cobre), Composição Externa (Abs E Borracha)\r\n\r\n-Frequência De Resposta: 20-20k Hz\r\n\r\n-Aviso Sobre O Produto: Imagens Meramente Ilustrativas*\r\n\r\n-Categoria Vtex: Earphone\r\n\r\n-Marca: Warrior\r\n\r\n-Potência: 100mw\r\n\r\n-Cor Principal: Vermelho\r\n\r\n-Categoria Na Vtex: Earphone\r\n\r\n-----------------------------------\r\nITENS INCLUSOS\r\n------------------------------------\r\n\r\n01 - WARRIOR FONE DE OUVIDO HEADSET GAMER NEW GENERATION - PH158\r\n\r\n-----------------------------------\r\nPERGUNTAS FREQUENTES\r\n------------------------------------\r\n\r\nQuais plataformas ele é aceito?\r\nR: Consoles e PCs\r\n\r\n-----------------------------------\r\nVANTAGENS\r\n------------------------------------\r\n\r\nAo comprar o produto conosco você conta com vantagens exclusivas como:\r\n\r\n> Trocas em até 30 dias (consulte o regulamento e itens elegíveis);\r\n\r\n> Atendimento exclusivo na central 0800;\r\n\r\n> Envio pelos Correios e várias outras transportadoras;\r\n\r\n> Prazo médio de postagem de 1 dia útil.\r\n\r\n-----------------------------------\r\nAGRADECEMOS A PREFERÊNCIA', '863e43c689805c0b128cc5be0b93f579.jpg', 'Fone de ouvido', 256, 5),
	(10, 'Fone De Ouvido Profissional Headset Gamer Kotion E', 'Fone De Ouvido Profissional Headset Gamer Kotion Each G2000\r\n\r\nFone De Ouvido Profissional Headset Gamer Kotion Each G2000 O headset KOTION EACH G2000 USB é projetado para Gamers Profissionais que esperam alto desempenho de seus equipamentos. , almofadas super macias e confortáveis e sem falar em seu Design com Leds sem igual. Ideal para você que joga games de FPS como CS:GO / OVERWATCH / Battlefield / Etc. Características: • Almofadas super confortáveis; • Design com LEDS; • Controle de volume e funções; • Microfone de alta qualidade; • Compatibilidade com Windows / Mac; Especificações: Modelo: KOTION EACH G2000 diâmetro do Speaker : 50mm Sensibilidade: 108dB +/- 3dB em 1kHz Impedância: 32 +/- 15ohm faixa de freqüência : 20Hz - 20KHz dimensão Mic : 6,0 * 5,0 milímetros Sensibilidade do microfone : -38dB +/- 3 dB Impedância Mic : 2.2kohm LED tensão de trabalho : DC5V +/- 5% Interface de fone de ouvido: USB+3.5mm Comprimento do cabo : Aprox. 2.2m / 7,22 pés Tamanho Headphone : Aprox. 20 * 10 * 21cm / 7.9 * 3.9 * 8.3in Peso Headphone : 419g / 14,8 oz Tamanho do pacote : 20,5 * 11,5 * 23,2 centímetros / 8.1 * 4.5 * 9.1in Peso da embalagem : 640g / 1.41Lbs Conteúdo do pacote: 1 x KOTION EACH G2000 USB Gaming Headphone 1 x Inglês Manual do Utilizador obs: existe um conector USB para ligar as luzes de LED, e dois conectores de áudio para fones de ouvido e microfone. o plug verde é para os fones de ouvido, e o vermelho é para o microfone. os fones de ouvido não funcionam no PS4, PS3, ou Xbox 360, ele só é compatível com laptop, a menos que você tem um adaptador de computadores ou PC Garantia de 90 dias apos o recebimento do produto', '0b90695180b148ce1ee10d4f9cca5990.jpg', 'Fone de ouvido', 210, 5);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Copiando estrutura para tabela ecommerce.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(50) NOT NULL DEFAULT '0',
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(50) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(50) DEFAULT '',
  `genero` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `nascimento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela ecommerce.usuario: ~1 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `cep`, `login`, `senha`, `nome`, `sobrenome`, `cidade`, `uf`, `logradouro`, `bairro`, `numero`, `complemento`, `genero`, `cpf`, `nascimento`) VALUES
	(3, '54800000', 'baoemerson15@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Emerson Leonardo Oliveira de Lira', NULL, 'Moreno', 'PE', 'Rua Japão', 'Pedreira', 2, '', 'Masculino', '11111111111', '1998-10-12');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
