import React, { useState } from "react";

import Modal from "@mui/material/Modal";
import Box from "@mui/material/Box";
import Typography from "@mui/material/Typography";

import "../styles/togglebutton.css";

function giveColor(bgColor) {
	switch (bgColor) {
		case "orange":
			return "orange";
		case "blue":
			return "blue";
		case "green":
			return "green";
		case "red":
			return "red";
		default:
			return "yellow";
	}
}

function giveStyle(bgColor) {
	switch (bgColor) {
		case "orange":
			return "repeating-linear-gradient(90deg, transparent, transparent 5px, rgba(255,255,255,.5) 5px, rgba(255,255,255,.5) 8px";
		case "blue":
			return "repeating-linear-gradient(120deg, transparent, transparent 5px, rgba(255,255,255,.5) 5px, rgba(255,255,255,.5) 8px";
		case "green":
			return "repeating-linear-gradient(200deg, transparent, transparent 8px, rgba(255,255,255,.5) 5px, rgba(255,255,255,.5) 16px";
		case "red":
			return "repeating-linear-gradient(70deg, transparent, transparent 8px, rgba(255,255,255,.5) 5px, rgba(255,255,255,.5) 16px";

		default:
			return "repeating-linear-gradient(45deg, transparent, transparent 5px, rgba(255,255,255,.5) 5px, rgba(255,255,255,.5) 8px";
	}
}

const Card = ({
	bgColor,
	name,
	location,
	collab,
	resume,
	stack,
	productOwner,
	resource1,
	resource2,
	resource3,
	domain,
	progress,
	creationDate,
}) => {
	const bgColor2 = giveColor(bgColor);
	const bgStyle = giveStyle(bgColor);

	const [open, setOpen] = useState(false);

	const handleOpen = () => {
		setOpen(true);
	};
	const handleClose = () => {
		setOpen(false);
	};

	const [state, setState] = useState(false);

	const toggle = () => {
		setState(!state);
	};

	return (
		<div className="Card" onClick={handleOpen}>
			<div
				style={{
					backgroundImage: bgStyle,
					backgroundColor: bgColor2,
				}}
			></div>

			<div className="title container">
				<div className="title2">Project</div>
				<p>{name}</p>
			</div>

			<div className="location container">
				<div className="title2">Location</div>
				<p>{location}</p>
			</div>

			<div className="collab container">
				<span>{collab} collaborators</span>
				<p>
					<div className="round r1"></div>
					<div className="round r2"></div>
					<div className="round r3"></div>
					<div className="round r4"></div>
				</p>
			</div>

			<Modal
				open={open}
				onClose={handleClose}
				aria-labelledby="modal-modal-title"
				aria-describedby="modal-modal-description"
			>
				<Box
					sx={{
						position: "relative",
						top: "50%",
						left: "50%",
						transform: "translate(-50%, -50%)",
						width: "70%",
						height: "70%",
						bgcolor: "background.paper",
						border: "2px solid #000",
						boxShadow: 24,
						p: 4,
					}}
				>
					<div
						className="side-panel"
						style={{
							backgroundColor: bgColor,
							backgroundImage: bgStyle,
							position: "absolute",
							top: "0",
							left: "0",
							width: "6%",
							height: "100%",
							writingMode: "vertical-lr",
							transform: "rotate(180deg)",
							paddingTop: 20,
							fontWeight: 700,
							fontSize: "1.2rem",
							letterSpacing: "1px",
							display: "flex",
							alignItems: "center",
							color: "white",
							textShadow:
								"black 1px 1px,black -1px 1px,black -1px -1px,black 1px -1px",
						}}
					>
						{domain}
					</div>

					<div
						style={{
							position: "absolute",
							bottom: 0,
							right: 0,
							width: "94%",
							height: "100%",
							color: "white",
						}}
					>
						<div
							style={{
								width: "90%",
								height: "80%",
								margin: "auto",
								color: "black",
								display: "grid",
							}}
						>
							<Typography
								id="modal-modal-title"
								variant="h3"
								component="h2"
								className="titlechange"
							>
								PROJECT : {name}
							</Typography>
							<div>
								Product Owner :{" "}
								<b
									style={{
										fontWeight: "bold",
									}}
								>
									{productOwner}
								</b>
							</div>
							<div>
								<b
									style={{
										fontWeight: "bold",
									}}
								>
									{collab}
								</b>{" "}
								collaborators
							</div>
							<div>
								Location :{" "}
								<b
									style={{
										fontWeight: "bold",
									}}
								>
									{location}
								</b>
							</div>
							<div>
								Starting Date :{" "}
								<b
									style={{
										fontWeight: "bold",
									}}
								>
									{creationDate}
								</b>
							</div>
							<div style={{ gridColumn: "1/3" }}>
								Resume : <br />
								{resume}
							</div>
							<div>
								Skills :{" "}
								<b
									style={{
										fontWeight: "bold",
									}}
								>
									{stack}
								</b>
							</div>
							<div>
								Resource :{" "}
								<b
									style={{
										fontWeight: "bold",
									}}
								>
									<span>{resource1}</span>
									<span>{resource2}</span>
									<span>{resource3}</span>
								</b>
							</div>
						</div>

						<div
							style={{
								backgroundColor: "#183650",
								width: "100%",
								height: "20%",
								display: "flex",
								justifyContent: "space-between",
								alignItems: "center",
							}}
						>
							<p
								style={{
									width: "45%",
									display: "flex",
									justifyContent: "space-around",
									fontSize: "2rem",
								}}
							>
								<b>
									Project Status :
									{progress !== "100%" ? " In Progress" : " Complete"}
								</b>
								<span style={{ color: "#e79759", fontWeight: "bold" }}>
									{progress}
								</span>
							</p>
							<button
								onClick={toggle}
								className={"togglebutton " + (state ? "toggleclose" : "")}
							>
								<p className="paraclick">
									{state ? "Project joined" : "Join project !"}
								</p>
							</button>
						</div>
					</div>
				</Box>
			</Modal>
		</div>
	);
};

export default Card;
