import React from "react";

import portrait from "/assets/src-2/portrait.jpg";
import logo from "/assets/src-2/logo.png";
import gearsolid from "/assets/src-2/gear-solid.svg";
const Header = () => {
  return (
    <div className="flex justify-between items-center align-center px-6 py-2">
      <img src={logo} alt="logo Apside" className="w-[22vh] h-auto disable-blur" />
      <div className="flex flex-row">
        <div className="flex flex-col justify-center mr-4">
          <p className="text-sm font-bold">Damien Dupont</p>
          <p className="text-xs text-right mb-1">Web developper</p>
          <div className="flex flex-row justify-end">
            <div className="flex justify-center bg-[#183650] w-14">
              <p className="text-[.7rem] text-center text-slate-100">log out</p>
            </div>
          </div>
        </div>
        <div className="relative flex flex-row items-end mr-5">
          <img src={portrait} alt="portrait" className="rounded-full w-16" />
		  <img src={gearsolid} className="absolute left-14 w-[3.5vh] h-auto z-10 ml-2" />
        </div>
      </div>
    </div>
  );
};

export default Header;
