import React, { useState } from 'react'
import { Container } from './styles'
import { FaBars, FaBell, FaFonticonsFi } from 'react-icons/fa'
import SideBar from '../SideBar'

const Header = () => {
  return (
    <Container>
      <FaBell/>
      {<SideBar active={true} />}
    </Container>
  )
}

export default Header