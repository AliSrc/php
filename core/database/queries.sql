select *
from pizzas
left join pizza_topping
on pizza_topping.pizza_number = pizzas.pizza_number
inner join toppings
on toppings.topping_id = pizza_topping.topping_id
where pizza_topping.pizza_number = 1
