select * from world.country;
select * from world.city;
select name,population, CountryCode from world.city where CountryCode = 'ESP' order by population desc;