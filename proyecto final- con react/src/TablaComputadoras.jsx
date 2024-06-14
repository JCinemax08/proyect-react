import { useState, useEffect } from 'react';
import { Calzado } from './helpers/Calzado.js';
import { useNavigate } from 'react-router-dom';

export const TablaComputadoras = () => {
  const [data, setData] = useState([]);
  const [allData, setAllData] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const datos = await Calzado();
        console.log('Datos obtenidos:', datos);
        setData(datos);
        setAllData(datos);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };
    fetchData();
  }, []);

  const navigate = useNavigate();

  const handleInsertarClick = () => {
    navigate('/Computadora o equipo/insertar');
  };

  const handleEliminarClick = () => {
    navigate('/Computadora o equipo/eliminar');
  };

  const handleModificarClick = () => {
    navigate('/Computadora o equipo/modificar');
  };

  return (
    <div className="w3-container">
      <table className="w3-table-all w3-card-4 w3-hoverable">
        <thead>
          <tr className="w3-light-grey">
            <th>ID</th>
            <th>MARCA PC</th>
            <th>ALMACENAMIENTO</th>
            <th>EXISTENCIA EN ALMACÉN</th>
            <th>STOCK MÍNIMO</th>
            <th>STOCK MÁXIMO</th>
            <th>COSTO DE COMPRA</th>
            <th>COSTO DE VENTA</th>
          </tr>
        </thead>
        <tbody>
          {data.map(d => (
            <tr key={d.ID_CAL}>
              <td>{d.ID_CAL}</td>
              <td>{d.MARCA_CAL}</td>
              <td>{d.AL}</td>
              <td>{d.STOCK_CAL}</td>
              <td>{d.STOCKMIN_CAL}</td>
              <td>{d.STOCKMAX_CAL}</td>
              <td>{d.CC_CAL}</td>
              <td>{d.CV_CAL}</td> 
            </tr>
          ))}
        </tbody>
      </table>
      <div className="w3-margin-top">
        <button onClick={handleInsertarClick} className="w3-button w3-blue w3-margin-right">Insertar Computadoras</button>
        <button onClick={handleEliminarClick} className="w3-button w3-blue w3-margin-right">Eliminar Computadoras</button>
        <button onClick={handleModificarClick} className="w3-button w3-blue w3-margin-right">Modificar Computadoras</button>
      </div>
    </div>
  );
};

export default TablaComputadoras;