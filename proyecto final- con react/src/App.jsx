import './App.css'
import { Route, Routes, Navigate } from 'react-router-dom'
import { NavBar } from './components/NavBar'
import { Inicio } from './components/Inicio.jsx'
import { TablaComputadoras } from './TablaComputadoras.jsx'
import { InsertarProducto } from './InsertarProducto.jsx';
import { EliminarProducto } from './EliminarProducto.jsx';
import { ModificarProducto } from './ModificarProducto.jsx';
import { TablaProveedores } from './TablaProveedores.jsx';
import { InsertarProveedor } from './InsertarProveedor.jsx'
import { EliminarProveedor } from './EliminarProveedor.jsx'
import { ModificarProveedor } from './ModificarProveedor.jsx'
import { TablaPedidos } from './TablaPedidos.jsx'
import { InsertarPedido } from './InsertarPedido.jsx'
import { EliminarPedido } from './EliminarPedido.jsx'
import { ModificarPedido } from './ModificarPedido.jsx'


function App() {
  return (
    <>
      <div className='w3-container'>
        <NavBar />
        <Routes>
          <Route path="/" element={<Inicio/>}></Route>
          <Route path="/computadoras" element={<TablaComputadoras/>}></Route>
          <Route path="/producto/insertar" element={<InsertarProducto/>}></Route>
          <Route path="/producto/eliminar" element={<EliminarProducto/>}></Route>
          <Route path="/Producto/modificar" element={<ModificarProducto/>}></Route>
          <Route path="/proveedores" element={<TablaProveedores/>}></Route>
          <Route path="/proveedores/insertar" element={<InsertarProveedor/>}></Route>
          <Route path="/proveedores/eliminar" element={<EliminarProveedor/>}></Route>
          <Route path="/proveedores/modificar" element={<ModificarProveedor/>}></Route>
          <Route path="/pedidos" element={<TablaPedidos/>}></Route>
          <Route path="/pedidos/insertar" element={<InsertarPedido/>}></Route>
          <Route path="/pedidos/eliminar" element={<EliminarPedido/>}></Route>
          <Route path="/pedidos/modificar" element={<ModificarPedido/>}></Route>
          <Route path="/*" element={<Navigate to='/' />}></Route>
        </Routes>
      </div>
    </>
  )
}

export default App
