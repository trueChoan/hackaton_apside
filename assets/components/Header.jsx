import React from "react";

import portrait from "/assets/src-2/portrait.jpg";
import logo from "/assets/src-2/logo.png";
import gearsolid from "/assets/src-2/gear-solid.svg";

import Box from "@mui/material/Box";
import Button from "@mui/material/Button";
import Typography from "@mui/material/Typography";
import Modal from "@mui/material/Modal";

import Checkbox from "@mui/material/Checkbox";

const style = {
	position: "absolute",
	top: "50%",
	left: "50%",
	transform: "translate(-50%, -50%)",
	width: 600,
	height: 300,
	bgcolor: "background.paper",
	border: "2px solid #000",
	boxShadow: 24,
	p: 4,
};

const label = { inputProps: { "aria-label": "Checkbox demo" } };

const Header = () => {
	const [open, setOpen] = React.useState(false);
	const handleOpen = () => setOpen(true);
	const handleClose = () => setOpen(false);

	return (
		<div
			className="flex justify-between items-center align-center px-6 py-2"
			id="HEADER"
		>
			<img
				src={logo}
				alt="logo Apside"
				className="w-[22vh] h-auto disable-blur mt-3"
			/>
			<h1 className="text-[#183650] font-extrabold text-xl	">
				IT Services and R&D consulting
			</h1>
			<div className="flex flex-row">
				<div className="flex flex-col justify-center mr-4">
					<p className="font-bold text-base	">Damien Dupont</p>
					<p className="text-xs text-right mb-1">Web developper</p>
					<div className="flex flex-row justify-end">
						<div className="flex justify-center bg-[#183650] w-14">
							<p className="text-[.7rem] text-center text-slate-100">Log out</p>
						</div>
					</div>
				</div>
				<div className="relative flex flex-row items-end">
					<img src={portrait} alt="portrait" className="rounded-full w-16" />
					<Button onClick={handleOpen}>
						<img
							src={gearsolid}
							className="w-[3.5vh] h-auto z-10 content-center items-center p-0 m-0"
						/>
					</Button>
					<Modal
						open={open}
						onClose={handleClose}
						aria-labelledby="modal-modal-title"
						aria-describedby="modal-modal-description"
					>
						<Box sx={style}>
							<Typography id="modal-modal-title" className="flex">
								<p className="font-['Montserrat'] text-2xl font-extrabold mr-4">
									Damien Dupont
								</p>
								<p className="font-['Montserrat'] text-base mt-2">
									Web developper
								</p>
							</Typography>
							<Typography id="modal-modal-description" sx={{ mt: 1 }}>
								<div className="text-[#e79759] text-2xl font-bold mt-6">
									Be the first to know about upcoming missions :
								</div>
								<div className="flex flex-col ml-20 mt-8 text-left">
									<div>
										<Checkbox {...label} defaultChecked />
										By Email : DamienDupont.dev@gmail.com
									</div>
									<div>
										<Checkbox {...label} />
										By mobile : 06 65 85 92 01
									</div>
									<p className="text-xs italic ml-10 -mt-2">
										One SMS will be sent to you per week
									</p>
								</div>
							</Typography>
						</Box>
					</Modal>
				</div>
			</div>
		</div>
	);
};

export default Header;
