import React from "react"
import SidePanel from "../components/Sidepanel"
import Login from "../components/Login"

function login() {
  return (
    <div className="connector">
    <SidePanel />
    <Login />
    </div>
  )
}

export default login