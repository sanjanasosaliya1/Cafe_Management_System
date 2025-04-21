
CREATE TABLE categories (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name TEXT,
    category_desc TEXT,
    category_created_date DATE,
    category_img TEXT
);

CREATE TABLE food_type (
    food_id INT PRIMARY KEY AUTO_INCREMENT,
    food_name TEXT,
    food_price INT,
    food_desc TEXT,
    category_id INT,
    food_update TEXT,
    food_img TEXT,
    is_veg TEXT,
    food_offer INT,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE
);

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name TEXT,
    firstname TEXT,
    lastname TEXT,
    user_email TEXT,
    user_phone TEXT,
    user_type TEXT,
    user_password TEXT,
    user_join_date DATE,
    user_img TEXT
);

CREATE TABLE cart (
    cart_item_id INT PRIMARY KEY AUTO_INCREMENT,
    food_id INT,
    item_quantity INT,
    user_id INT,
    cart_added_date DATE,
    FOREIGN KEY (food_id) REFERENCES food_type(food_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE site (
    temp_id INT PRIMARY KEY AUTO_INCREMENT,
    system_name TEXT,
    email TEXT,
    contact TEXT,
    address TEXT,
    date_time TIMESTAMP
);

CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    address TEXT,
    zip_code INT,
    phone_no TEXT,
    amount INT,
    payment_mode TEXT,
    order_status TEXT,
    order_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE contact (
    contact_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    email TEXT,
    phone_no TEXT,
    order_id INT,
    message TEXT,
    time TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE
);

CREATE TABLE contact_reply (
    cr_id INT PRIMARY KEY AUTO_INCREMENT,
    contact_id INT,
    user_id INT,
    message TEXT,
    date_time TIMESTAMP,
    FOREIGN KEY (contact_id) REFERENCES contact(contact_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE delivery_details (
    delivery_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    delivery_boy_name TEXT,
    delivery_boy_phoneno TEXT,
    delivery_time INT,
    date_time TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE
);

CREATE TABLE order_item (
    order_item_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    food_id INT,
    item_quantity INT,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (food_id) REFERENCES food_type(food_id) ON DELETE CASCADE
);

CREATE TABLE eatlist (
    eatlist_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    food_id INT,
    added_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (food_id) REFERENCES food_type(food_id) ON DELETE CASCADE
);



INSERT INTO users (user_id, user_name, firstname, lastname, user_email, user_phone, user_type, user_password, user_join_date, user_img) VALUES (NULL, 'admin', 'admin', 'admin', 'admin@gmail.com', '9876543210', 'admin', 'admin', '2025-01-11', NULL);

INSERT INTO site (temp_id, system_name, email, contact, address, date_time) VALUES (NULL, 'Silent Zone Cafe', 'silentzonecafe@gmail.com', '9876567898', '123,Vesu,Surat,Gujarat', '2025-01-11 10:17:50');



INSERT INTO categories (category_name, category_desc, category_created_date,category_img) VALUES
('Hot Drinks', 'Various hot beverages like coffee, tea, etc.', NOW(),'Category_1.webp'),
('Cold Drinks', 'Various cold beverages like juices, sodas, etc.', NOW(),'Category_2.jpg'),
('Soft Drinks', 'Non-alcoholic carbonated beverages.', NOW(),'category_3.jpg'),
('Alcoholic Beverage', 'Drinks containing alcohol.', NOW(),'category_4.png'),
('Pastries', 'Baked goods like croissants, donuts, etc.', NOW(),'category_5.jpg'),
('Sandwiches & Wraps', 'A variety of sandwiches and wraps.', NOW(),'category_6.webp'),
('Porridge/Cereal', 'Warm breakfast porridge and cereals.', NOW(),'category_7.jpg'),
('Chips & Dips', 'Crispy chips with various dips.', NOW(),'category_8.jpg'),
('Nachos', 'Corn tortilla chips with toppings.', NOW(),'category_9.jpg'),
('Cookies', 'Freshly baked cookies in different flavors.', NOW(),'category_10.jpg'),
('Salads', 'Various types of fresh salads.', NOW(),'category_11.jpg'),
('Paninis & Burgers', 'Grilled paninis and delicious burgers.', NOW(),'category_12.jpg'),
('Soups', 'Warm soups in various flavors.', NOW(),'category_13.jpg'),
('Pasta & Noodles', 'Different types of pasta and noodles.', NOW(),'category_14.jpg'),
('Cakes & Pies', 'Sweet cakes and pies in various flavors.', NOW(),'category_15.webp'),
('Ice Cream', 'Frozen desserts in different flavors.', NOW(),'category_16.jpg'),
('Puddings', 'Sweet and creamy puddings.', NOW(),'category_17.jpg'),
('Pizza', 'Various types of pizzas with different toppings.', NOW(),'category_18.jpg'),
('Frankie', 'Indian-style wraps filled with various ingredients.', NOW(),'category_19.jpg'),
('Sizzler', 'Hot sizzling plates with different meats and veggies.', NOW(),'category_20.webp');



INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img,is_veg,food_offer)
VALUES 
('Espresso', 100, 'Strong black coffee', 1, NOW(), '1_item_1.jpg','Veg',120),
('Cappuccino', 120, 'Espresso with frothed milk', 1, NOW(), '1_item_2.jpg','Veg',150),
('Latte', 130, 'Espresso with steamed milk', 1, NOW(), '1_item_3.jpg','Veg',150),
('Americano', 110, 'Diluted espresso', 1, NOW(), '1_item_4.jpg','Veg',130),
('Macchiato', 140, 'Espresso with a dash of milk', 1, NOW(), '1_item_5.jpg','Veg',160),
('Flat White', 135, 'Smooth coffee with milk', 1, NOW(), '1_item_6.jpg','Veg',145),
('Mocha', 150, 'Espresso with chocolate', 1, NOW(), '1_item_7.jpg','Veg',170),
('Hot Chocolate', 130, 'Warm chocolate drink', 1, NOW(), '1_item_8.jpg','Veg',180),
('Tea', 80, 'Variety of teas', 1, NOW(), '1_item_9.jpg','Veg',100),
('Chai Latte', 125, 'Spiced tea with milk', 1, NOW(), '1_item_10.jpeg','Veg',170);

INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Iced Coffee', 120, 'Chilled coffee', 2, NOW(), '2_item_1.webp','Veg',150),
('Iced Latte', 130, 'Chilled latte', 2, NOW(), '2_item_2.jpeg','Veg',160),
('Iced Americano', 110, 'Chilled americano', 2, NOW(), '2_item_3.jpg','Veg',140),
('Iced Mocha', 140, 'Chilled mocha', 2, NOW(), '2_item_4.jpg','Veg',170),
('Iced Tea', 90, 'Chilled tea', 2, NOW(), '2_item_5.jpg','Veg',120),
('Cold Brew', 150, 'Slow brewed coffee', 2, NOW(), '2_item_6.jpg','Veg',180),
('Iced Matcha Latte', 160, 'Chilled matcha drink', 2, NOW(), '2_item_7.webp','Veg',200),
('Fruit Smoothie', 180, 'Blended fruit drink', 2, NOW(), '2_item_8.jpg','Veg',210),
('Iced Lemonade', 100, 'Chilled lemonade', 2, NOW(), '2_item_9.webp','Veg',130),
('Milkshake', 170, 'Flavored milk drink', 2, NOW(), '2_item_10.jpg','Veg',200);


INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Coca-Cola', 50, 'Carbonated drink', 3, NOW(), '3_item_1.jpg', 'Veg', 70),
('Diet Coke', 50, 'Low calorie cola', 3, NOW(), '3_item_2.png', 'Veg', 70),
('Sprite', 50, 'Lemon-lime soda', 3, NOW(), '3_item_3.jpg', 'Veg', 70),
('Lemonade', 60, 'Citrus drink', 3, NOW(), '3_item_4.jpg', 'Veg', 80),
('Orange Juice', 70, 'Fresh orange juice', 3, NOW(), '3_item_5.jpg', 'Veg', 90),
('Apple Juice', 70, 'Fresh apple juice', 3, NOW(), '3_item_6.png', 'Veg', 90),
('Iced Green Tea', 75, 'Chilled green tea', 3, NOW(), '3_item_7.png', 'Veg', 95),
('Sparkling Water', 40, 'Carbonated water', 3, NOW(), '3_item_8.png', 'Veg', 60),
('Root Beer', 60, 'Root flavored soda', 3, NOW(), '3_item_9.png', 'Veg', 80),
('Ginger Ale', 60, 'Ginger-flavored soda', 3, NOW(), '3_item_10.png', 'Veg', 80);


INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Craft Beer', 200, 'Premium beer', 4, NOW(), '4_item_1.jpg', 'Non-Veg', 250),
('Red Wine', 300, 'Classic red wine', 4, NOW(), '4_item_2.jpg', 'Non-Veg', 350),
('White Wine', 300, 'Classic white wine', 4, NOW(), '4_item_3.jpg', 'Non-Veg', 350),
('Margarita', 250, 'Tequila-based cocktail', 4, NOW(), '4_item_5.jpg', 'Non-Veg', 300),
('Sangria', 270, 'Fruit-infused wine cocktail', 4, NOW(), '4_item_6.jpg', 'Non-Veg', 320),
('Whiskey', 350, 'Premium whiskey', 4, NOW(), '4_item_7.jpg', 'Non-Veg', 400),
('Vodka', 300, 'Premium vodka', 4, NOW(), '4_item_8.jpg', 'Non-Veg', 350),
('Gin and Tonic', 280, 'Gin cocktail', 4, NOW(), '4_item_9.jpg', 'Non-Veg', 330),
('Baileys Irish Cream', 320, 'Creamy liqueur', 4, NOW(), '4_item_10.jpg', 'Non-Veg', 370);



INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Croissant', 100, 'Buttery pastry', 5, NOW(), '5_item_1.jpg', 'Veg', 130),
('Muffins (Blueberry, Chocolate)', 90, 'Assorted muffins', 5, NOW(), '5_item_2.jpg', 'Veg', 120),
('Danish Pastry', 110, 'Sweet pastry', 5, NOW(), '5_item_3.jpg', 'Veg', 140),
('Scones', 120, 'Classic scones', 5, NOW(), '5_item_4.jpg', 'Veg', 150),
('Cinnamon Roll', 130, 'Cinnamon flavored roll', 5, NOW(), '5_item_5.jpg', 'Veg', 160),
('Pain au Chocolat', 140, 'Chocolate-filled pastry', 5, NOW(), '5_item_6.jpg', 'Veg', 170),
('Almond Croissant', 150, 'Croissant with almonds', 5, NOW(), '5_item_7.jpg', 'Veg', 180),
('Lemon Pound Cake', 160, 'Lemon flavored cake', 5, NOW(), '5_item_8.jpg', 'Veg', 190),
('Banana Bread', 100, 'Banana flavored bread', 5, NOW(), '5_item_9.jpg', 'Veg', 130),
('Biscotti', 90, 'Italian almond biscuit', 5, NOW(), '5_item_10.jpg', 'Veg', 120);


INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Bagel with Cream Cheese', 150, 'Bagel with cream cheese spread', 6, NOW(), '6_item_1.jpg', 'Veg', 180),
('Avocado Toast', 180, 'Toast with avocado', 6, NOW(), '6_item_2.jpg', 'Veg', 210),
('Bacon and Cheese Sandwich', 200, 'Bacon and cheese filling', 6, NOW(), '6_item_3.jpg', 'Non-Veg', 230),
('Grilled Cheese', 150, 'Grilled cheese sandwich', 6, NOW(), '6_item_4.jpg', 'Veg', 180),
('Veggie Sandwich', 140, 'Vegetable sandwich', 6, NOW(), '6_item_5.jpg', 'Veg', 170),
('Ham and Cheese Croissant', 170, 'Croissant with ham and cheese', 6, NOW(), '6_item_6.jpg', 'Non-Veg', 200),
('Turkey & Cheese Sandwich', 200, 'Turkey and cheese sandwich', 6, NOW(), '6_item_7.jpg', 'Non-Veg', 230),
('Veggie Wrap', 150, 'Wrap with veggies', 6, NOW(), '6_item_8.jpg', 'Veg', 180),
('BLT Wrap', 180, 'Bacon, lettuce, tomato wrap', 6, NOW(), '6_item_9.jpg', 'Non-Veg', 210),
('Tuna Melt', 190, 'Tuna and cheese melt', 6, NOW(), '6_item_10.jpg', 'Non-Veg', 220);


INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Oatmeal with Honey', 100, 'Oatmeal served with honey', 7, NOW(), '7_item_1.jpg', 'Veg', 130),
('Porridge with Fruits', 120, 'Porridge topped with fresh fruits', 7, NOW(), '7_item_2.jpg', 'Veg', 150),
('Muesli', 110, 'Healthy muesli breakfast', 7, NOW(), '7_item_3.jpg', 'Veg', 140),
('Granola', 120, 'Granola with nuts and fruits', 7, NOW(), '7_item_4.jpg', 'Veg', 150),
('Chia Pudding', 130, 'Chia seeds soaked in milk', 7, NOW(), '7_item_5.jpg', 'Veg', 160),
('Overnight Oats', 140, 'Oats soaked overnight with fruits', 7, NOW(), '7_item_6.jpg', 'Veg', 170),
('Creamy Rice Pudding', 150, 'Rice pudding with cream', 7, NOW(), '7_item_7.jpg', 'Veg', 180),
('Cornflakes', 90, 'Cornflakes served with milk', 7, NOW(), '7_item_8.jpg', 'Veg', 120),
('Cereal with Milk', 100, 'Assorted cereal with milk', 7, NOW(), '7_item_9.jpg', 'Veg', 130),
('Porridge with Cinnamon and Apples', 130, 'Porridge with cinnamon and apples', 7, NOW(), '7_item_10.jpg', 'Veg', 160);


INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Potato Chips', 90, 'Crispy potato chips', 8, NOW(), '8_item_1.jpg', 'Veg', 120),
('Tortilla Chips with Guacamole', 120, 'Tortilla chips served with guacamole', 8, NOW(), '8_item_2.jpg', 'Veg', 150),
('Nachos with Cheese', 130, 'Nachos topped with cheese', 8, NOW(), '8_item_3.jpg', 'Veg', 160),
('Salsa & Chips', 110, 'Chips served with salsa dip', 8, NOW(), '8_item_4.jpg', 'Veg', 140),
('Hummus with Pita', 150, 'Hummus served with pita bread', 8, NOW(), '8_item_5.jpg', 'Veg', 180),
('Veggie Chips', 120, 'Assorted vegetable chips', 8, NOW(), '8_item_6.jpg', 'Veg', 150),
('Sweet Potato Fries', 130, 'Sweet potato fries served with dip', 8, NOW(), '8_item_7.jpg', 'Veg', 160),
('Onion Rings', 140, 'Crispy fried onion rings', 8, NOW(), '8_item_8.jpg', 'Veg', 170),
('Chips with Salsa Verde', 120, 'Chips served with green salsa', 8, NOW(), '8_item_9.jpg', 'Veg', 150),
('Mozzarella Sticks', 150, 'Fried mozzarella sticks', 8, NOW(), '8_item_10.jpg', 'Veg', 180);


INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Classic Nachos', 150, 'Traditional nachos with cheese', 9, NOW(), '9_item_1.jpg', 'Veg', 180),
('Nachos with Guacamole', 160, 'Nachos served with guacamole', 9, NOW(), '9_item_2.jpg', 'Veg', 190),
('Nachos with Sour Cream', 170, 'Nachos served with sour cream', 9, NOW(), '9_item_3.jpg', 'Veg', 200),
('Nachos with Beef', 180, 'Nachos topped with beef', 9, NOW(), '9_item_4.jpg', 'Non-Veg', 210),
('Tex-Mex Nachos', 190, 'Tex-Mex style nachos', 9, NOW(), '9_item_5.jpg', 'Veg', 220),
('Veggie Nachos', 160, 'Vegetarian nachos with veggies', 9, NOW(), '9_item_6.jpg', 'Veg', 190),
('Nachos with Jalapeños', 170, 'Nachos topped with jalapeños', 9, NOW(), '9_item_7.jpg', 'Veg', 200),
('BBQ Nachos', 180, 'Nachos with BBQ sauce', 9, NOW(), '9_item_8.jpg', 'Veg', 210),
('Nachos with Beans', 150, 'Nachos served with beans', 9, NOW(), '9_item_9.jpg', 'Veg', 180),
('Nachos with Cheese', 160, 'Nachos served with cheese', 9, NOW(), '9_item_10.jpg', 'Veg', 190);


INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Oatmeal Cookies', 100, 'Oatmeal based cookies', 10, NOW(), '10_item_1.webp', 'Veg', 130),
('Chocolate Chip Cookies', 120, 'Chocolate chip cookies', 10, NOW(), '10_item_2.jpg', 'Veg', 150),
('Sugar Cookies', 90, 'Classic sugar cookies', 10, NOW(), '10_item_3.webp', 'Veg', 120),
('Butter Cookies', 110, 'Butter flavored cookies', 10, NOW(), '10_item_4.jpg', 'Veg', 140),
('Fortune Cookies', 130, 'Fortune revealing cookies', 10, NOW(), '10_item_5.webp', 'Veg', 160),
('ShortBread Cookies', 140, 'Shortbread style cookies', 10, NOW(), '10_item_6.jpg', 'Veg', 170),
('Peanut Butter Cookies', 150, 'Peanut butter flavored cookies', 10, NOW(), '10_item_7.jpg', 'Veg', 180),
('Macaroon Cookies', 160, 'Macaroon cookies', 10, NOW(), '10_item_8.jpg', 'Veg', 190),
('SnickerDoodle Cookies', 150, 'Cinnamon sugar cookies', 10, NOW(), '10_item_9.jpg', 'Veg', 180),
('Mango Cookies', 140, 'Mango flavored cookies', 10, NOW(), '10_item_10.jpg', 'Veg', 170);




INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Caesar Salad', 150, 'Classic Caesar salad', 11, NOW(), '11_item_1.jpg', 'Veg', 180),
('Greek Salad', 160, 'Traditional Greek salad', 11, NOW(), '11_item_2.webp', 'Veg', 190),
('Cobb Salad', 170, 'Cobb style salad', 11, NOW(), '11_item_3.jpg', 'Veg', 200),
('Spinach & Arugula Salad', 140, 'Spinach and arugula mix', 11, NOW(), '11_item_4.webp', 'Veg', 160),
('Fruit Salad', 120, 'Assorted fruit salad', 11, NOW(), '11_item_5.jpg', 'Veg', 150),
('Quinoa Salad', 130, 'Quinoa and veggie salad', 11, NOW(), '11_item_6.jpg', 'Veg', 170),
('Caprese Salad', 140, 'Tomato and mozzarella salad', 11, NOW(), '11_item_7.avif', 'Veg', 180),
('Tuna Salad', 150, 'Tuna and greens salad', 11, NOW(), '11_item_8.jpg', 'Non-Veg', 200),
('Beetroot Salad', 160, 'Beetroot based salad', 11, NOW(), '11_item_9.jpg', 'Veg', 190),
('Avocado Salad', 170, 'Avocado and greens salad', 11, NOW(), '11_item_10.jpg', 'Veg', 210);

INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Grilled Cheese Panini', 150, 'Grilled cheese panini sandwich', 12, NOW(), '12_item_1.jpg', 'Veg', 180),
('Turkey & Cranberry Panini', 160, 'Turkey with cranberry sauce', 12, NOW(), '12_item_2.jpg', 'Non-Veg', 190),
('Veggie Panini', 140, 'Vegetable filled panini', 12, NOW(), '12_item_3.jpg', 'Veg', 170),
('Caprese Panini', 130, 'Tomato and mozzarella panini', 12, NOW(), '12_item_4.jpg', 'Veg', 160),
('Classic Cheeseburger', 170, 'Cheeseburger with beef patty', 12, NOW(), '12_item_5.webp', 'Non-Veg', 200),
('Veggie Burger', 150, 'Vegetarian burger', 12, NOW(), '12_item_6.webp', 'Veg', 180),
('Bacon Cheeseburger', 180, 'Bacon and cheese burger', 12, NOW(), '12_item_7.jpg', 'Non-Veg', 210),
('Aloo Tikki Burger', 140, 'Indian style potato burger', 12, NOW(), '12_item_8.jpg', 'Veg', 170),
('Paneer Tikka Burger', 160, 'Paneer tikka burger', 12, NOW(), '12_item_9.jpg', 'Veg', 190),
('Mushroom Swiss Burger', 170, 'Mushroom and Swiss cheese burger', 12, NOW(), '12_item_10.jpg', 'Veg', 200);

INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Tomato Soup', 100, 'Classic tomato soup', 13, NOW(), '13_item_1.jpg', 'Veg', 130),
('Minestrone Soup', 120, 'Italian vegetable soup', 13, NOW(), '13_item_2.jpg', 'Veg', 140),
('Butternut Squash Soup', 130, 'Creamy butternut squash soup', 13, NOW(), '13_item_3.jpg', 'Veg', 150),
('Lentil Soup', 110, 'Lentil based soup', 13, NOW(), '13_item_4.jpg', 'Veg', 135),
('Broccoli & Cheddar Soup', 140, 'Broccoli soup with cheddar cheese', 13, NOW(), '13_item_5.jpg', 'Veg', 160),
('French Onion Soup', 150, 'French style onion soup', 13, NOW(), '13_item_6.webp', 'Veg', 170),
('Potato Leek Soup', 120, 'Potato and leek soup', 13, NOW(), '13_item_7.jpg', 'Veg', 140),
('Mushroom Soup', 130, 'Creamy mushroom soup', 13, NOW(), '13_item_8.webp', 'Veg', 150),
('Split Pea Soup', 110, 'Green split pea soup', 13, NOW(), '13_item_9.jpg', 'Veg', 130),
('Veg Manchow Soup', 140, 'Spicy vegetable manchow soup', 13, NOW(), '13_item_10.jpg', 'Veg', 160);

INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Spaghetti Aglio e Olio', 150, 'Simple garlic and oil spaghetti', 14, NOW(), '14_item_1.jpg', 'Veg', 180),
('Penne Arrabbiata', 160, 'Spicy tomato sauce penne', 14, NOW(), '14_item_2.jpg', 'Veg', 190),
('Carbonara', 170, 'Classic Italian carbonara', 14, NOW(), '14_item_3.jpeg', 'Non-Veg', 200),
('Lasagna', 180, 'Layered pasta dish', 14, NOW(), '14_item_4.jpg', 'Non-Veg', 220),
('Fettuccine Alfredo', 160, 'Creamy Alfredo sauce pasta', 14, NOW(), '14_item_5.jpg', 'Non-Veg', 210),
('Pesto Pasta', 150, 'Pasta with basil pesto', 14, NOW(), '14_item_6.jpg', 'Veg', 180),
('Macaroni & Cheese', 140, 'Cheesy macaroni', 14, NOW(), '14_item_7.jpg', 'Veg', 170),
('Ravioli', 170, 'Stuffed ravioli pasta', 14, NOW(), '14_item_8.webp', 'Non-Veg', 200),
('Pad Thai', 180, 'Thai style noodles', 14, NOW(), '14_item_9.webp', 'Veg', 190),
('Ramen', 190, 'Japanese ramen soup', 14, NOW(), '14_item_10.jpg', 'Non-Veg', 210);

INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Chocolate Cake', 150, 'Rich chocolate cake', 15, NOW(), '15_item_1.jpg', 'Veg', 180),
('Cheese Cake', 160, 'Classic cheesecake', 15, NOW(), '15_item_2.webp', 'Veg', 190),
('Lemon Meringue Pie', 140, 'Lemon pie with meringue topping', 15, NOW(), '15_item_3.webp', 'Veg', 160),
('Apple Pie', 130, 'Classic apple pie', 15, NOW(), '15_item_4.webp', 'Veg', 150),
('Red Velvet Cake', 170, 'Red velvet cake with cream cheese frosting', 15, NOW(), '15_item_5.webp', 'Veg', 200),
('Carrot Cake', 160, 'Carrot cake with nuts', 15, NOW(), '15_item_6.jpg', 'Veg', 190),
('Tiramisu', 180, 'Classic Italian tiramisu', 15, NOW(), '15_item_7.webp', 'Non-Veg', 210),
('Pumpkin Pie', 140, 'Pumpkin based pie', 15, NOW(), '15_item_8.jpg', 'Veg', 160),
('Key Lime Pie', 130, 'Tangy key lime pie', 15, NOW(), '15_item_9.jpg', 'Veg', 150),
('Strawberry Shortcake', 150, 'Strawberry shortcake dessert', 15, NOW(), '15_item_10.jpg', 'Veg', 180);


INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Vanilla Ice Cream', 100, 'Classic vanilla ice cream', 16, NOW(), '16_item_1.jpg', 'Veg', 130),
('Chocolate Ice Cream', 120, 'Chocolate flavored ice cream', 16, NOW(), '16_item_2.jpg', 'Veg', 150),
('Strawberry Ice Cream', 130, 'Strawberry flavored ice cream', 16, NOW(), '16_item_3.webp', 'Veg', 160),
('Mint Chocolate Chip', 140, 'Mint flavored ice cream with chocolate chips', 16, NOW(), '16_item_4.png', 'Veg', 170),
('Cookies & Cream', 150, 'Cookies blended in ice cream', 16, NOW(), '16_item_5.webp', 'Veg', 180),
('Coffee Ice Cream', 160, 'Coffee flavored ice cream', 16, NOW(), '16_item_6.jpg', 'Veg', 190),
('Pistachio Ice Cream', 150, 'Pistachio flavored ice cream', 16, NOW(), '16_item_7.jpg', 'Veg', 180),
('Mango Sorbet', 140, 'Mango flavored sorbet', 16, NOW(), '16_item_8.webp', 'Veg', 160),
('Coconut Ice Cream', 130, 'Coconut flavored ice cream', 16, NOW(), '16_item_9.jpg', 'Veg', 150),
('Salted Caramel Ice Cream', 150, 'Salted caramel flavored ice cream', 16, NOW(), '16_item_10.jpg', 'Veg', 180);

INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Chocolate Pudding', 120, 'Rich chocolate pudding', 17, NOW(), '17_item_1.webp', 'Veg', 150),
('Rice Pudding', 110, 'Creamy rice pudding', 17, NOW(), '17_item_2.jpg', 'Veg', 130),
('Tapioca Pudding', 100, 'Tapioca pearl pudding', 17, NOW(), '17_item_3.webp', 'Veg', 120),
('Bread Pudding', 130, 'Classic bread pudding', 17, NOW(), '17_item_4.jpg', 'Veg', 150),
('Mango Pudding', 120, 'Sweet mango pudding', 17, NOW(), '17_item_5.jpg', 'Veg', 140),
('Custard Pudding', 110, 'Creamy custard pudding', 17, NOW(), '17_item_6.jpg', 'Veg', 130),
('Creme Brûlée', 140, 'French dessert with caramel topping', 17, NOW(), '17_item_7.jpg', 'Non-Veg', 170),
('Banana Pudding', 120, 'Banana flavored pudding', 17, NOW(), '17_item_8.jpg', 'Veg', 140),
('Chia Pudding', 110, 'Healthy chia seed pudding', 17, NOW(), '17_item_9.jpg', 'Veg', 130),
('Panna Cotta', 150, 'Italian creamy dessert', 17, NOW(), '17_item_10.jpg', 'Non-Veg', 180);

INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Margherita Pizza', 200, 'Classic Margherita pizza', 18, NOW(), '18_item_1.jpg', 'Veg', 230),
('Pepperoni Pizza', 220, 'Pizza topped with pepperoni slices', 18, NOW(), '18_item_2.avif', 'Non-Veg', 250),
('Veggie Supreme Pizza', 210, 'Pizza loaded with vegetables', 18, NOW(), '18_item_3.png', 'Veg', 240),
('Four Cheese Pizza', 230, 'Pizza with four types of cheese', 18, NOW(), '18_item_4.jpg', 'Veg', 260),
('Hawaiian Pizza', 220, 'Pizza with pineapple and ham', 18, NOW(), '18_item_5.webp', 'Non-Veg', 250),
('Meat Lovers Pizza', 250, 'Pizza loaded with various meats', 18, NOW(), '18_item_6.jpg', 'Non-Veg', 270),
('Paneer Tikka Pizza', 210, 'Pizza with paneer tikka topping', 18, NOW(), '18_item_7.jpg', 'Veg', 240),
('Mushroom & Spinach Pizza', 200, 'Pizza with mushrooms and spinach', 18, NOW(), '18_item_8.jpg', 'Veg', 230),
('Pesto Pizza', 230, 'Pizza with pesto sauce', 18, NOW(), '18_item_9.jpg', 'Veg', 260),
('Farm House Pizza', 220, 'Pizza with farm fresh vegetables', 18, NOW(), '18_item_10.avif', 'Veg', 250);

INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Veg Frankie', 100, 'Vegetable stuffed frankie', 19, NOW(), '19_item_1.jpg', 'Veg', 130),
('Paneer Frankie', 120, 'Paneer stuffed frankie', 19, NOW(), '19_item_2.jpg', 'Veg', 140),
('Cheese Frankie', 130, 'Cheese stuffed frankie', 19, NOW(), '19_item_3.jpg', 'Veg', 150),
('Aloo Tikki Frankie', 110, 'Aloo tikki stuffed frankie', 19, NOW(), '19_item_4.jpg', 'Veg', 140),
('Spicy Schezwan Frankie', 140, 'Spicy schezwan frankie', 19, NOW(), '19_item_5.jpg', 'Veg', 160),
('Mixed Veg Frankie', 120, 'Mixed vegetables stuffed frankie', 19, NOW(), '19_item_6.jpg', 'Veg', 140),
('Corn & Cheese Frankie', 130, 'Corn and cheese frankie', 19, NOW(), '19_item_7.jpg', 'Veg', 150),
('Hakka Noodles Frankie', 150, 'Frankie with hakka noodles stuffing', 19, NOW(), '19_item_8.jpg', 'Non-Veg', 180),
('Manchurian Frankie', 140, 'Frankie with manchurian stuffing', 19, NOW(), '19_item_9.jpg', 'Non-Veg', 170),
('Palak Paneer Frankie', 150, 'Frankie with spinach and paneer', 19, NOW(), '19_item_10.webp', 'Veg', 160);

INSERT INTO food_type (food_name, food_price, food_desc, category_id, food_update, food_img, is_veg, food_offer)
VALUES 
('Veg Sizzler', 250, 'Vegetable sizzler with rice', 20, NOW(), '20_item_1.webp', 'Veg', 280),
('Paneer Sizzler', 270, 'Paneer sizzler with vegetables', 20, NOW(), '20_item_2.jpg', 'Veg', 300),
('Steak Sizzler', 300, 'Steak sizzler with sides', 20, NOW(), '20_item_3.jpg', 'Non-Veg', 320),
('Mushroom & Spinach Sizzler', 260, 'Sizzler with mushrooms and spinach', 20, NOW(), '20_item_4.jpg', 'Veg', 280),
('Tandoori Paneer Sizzler', 280, 'Paneer with tandoori spices', 20, NOW(), '20_item_5.jpg', 'Veg', 310),
('Mixed Grill Sizzler', 320, 'Mixed grill sizzler platter', 20, NOW(), '20_item_6.jpg', 'Non-Veg', 330),
('Pasta Sizzler', 270, 'Sizzler with pasta and vegetables', 20, NOW(), '20_item_7.jpg', 'Veg', 300),
('Mexican Sizzler', 300, 'Mexican style sizzler', 20, NOW(), '20_item_8.jpg', 'Non-Veg', 320),
('Cheese Corn Sizzler', 280, 'Sizzler with cheese and corn', 20, NOW(), '20_item_9.webp', 'Veg', 310),
('Paneer Tikka Sizzler', 290, 'Paneer tikka sizzler', 20, NOW(), '20_item_10.jpg', 'Veg', 320);
