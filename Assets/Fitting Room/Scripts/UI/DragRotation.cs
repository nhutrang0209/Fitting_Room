using System;
using UnityEngine;
using UnityEngine.EventSystems;

namespace Fitting_Room
{
    public class DragRotation : MonoBehaviour, IDragHandler, IEndDragHandler
    {
        [SerializeField] private float rotateSpeed;
        
        private Player _player;

        private float _yRotation;

        private void Start()
        {
            _player = GameManager.Instance.Player;

            var eulerAngle = _player.transform.rotation.eulerAngles;
            _yRotation = eulerAngle.y;
        }

        public void OnDrag(PointerEventData eventData)
        {
            var deltaPos = eventData.delta;

            _yRotation -= deltaPos.x * Time.deltaTime * rotateSpeed;

            Quaternion rotation = Quaternion.Euler(0, _yRotation, 0);

            _player.transform.rotation = rotation;
        }

        public void OnEndDrag(PointerEventData eventData)
        {
            
        }
    }
}