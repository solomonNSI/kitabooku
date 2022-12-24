import React from 'react'
import { Button } from '../../Views/AppView/style'
import { Container } from './styles'

const SideBarItem = ({ Icon, Text }) => {
  return (
    <Container>
      <Icon />
      {Text}
    </Container>
  )
}

export default SideBarItem