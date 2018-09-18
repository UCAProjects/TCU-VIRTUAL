Select G.codigo 
From tigrupou_tcu.grupos  G
Left Outer Join
       tigrupou_tcu.estudiantes  E
ON   G.Codigo = E.grupo 
where E.Codigo is null