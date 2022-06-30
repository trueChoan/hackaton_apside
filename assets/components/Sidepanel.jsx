import React from "react"
import { Fade } from "react-awesome-reveal";

import Logo from "../src/image/logo.png"
import Facebook from "../src/image/facebook.svg"
import Linkedin from "../src/image/linkedin.svg"
import "../styles/connexion.css"

function SidePanel() {
    return (
        <div className="child">
          <img className="logo" src={Logo} alt={Logo}></img>
          <hr className="hr1"></hr>
          <h1 className="titlezone">IT Services and R&D consulting</h1>
          <Fade delay={1000}>
          <h2 className="herezone">NEW HERE ?</h2>
          <hr className="hr2"></hr>
          <button className="buttonask"><p className="request">Request an access</p></button>
          </Fade>
          <div className="blocbleu">
          <h3 className="social">TALENT, EXPERTISE AND INNOVATION</h3>
          </div>
          <div className="logosocial"> 
          <img className="lk" src={Facebook} alt={Facebook}></img>
          <img className="lk" src={Linkedin} alt={Linkedin}></img>
          </div>
        </div>
    )
  }
  
  export default SidePanel