CREATE DEFINER=`root`@`localhost` PROCEDURE `readInstrecteurInDienst`()
BEGIN
SELECT ins.Voornaam,
	ins.Tussenvoegsel,
    ins.Achternaam,
    ins.Mobiel,
    ins.DatumInDienst,
    ins.AantalSterren
    FROM Instructeur AS ins
    ORDER BY ins.AantalSterren DESC;
END